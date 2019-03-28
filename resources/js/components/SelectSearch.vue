<template>
    <div id="root">
        <!-- This hidden field returns the actual value -->
        <input type="hidden" v-model="value" :name="name" @input="handleInput" >
        <!-- Search Box -->
        <input @focus="showOptions" :placeholder="placeholder" v-model="text" type="text" class="form-control mb-2">
        <!-- Options <div> -->
        <div id="options" v-if="isVisible">
            <!-- Options <a> -->
            <a v-for="option in options" :key="option.id" @click.prevent="setValueSelect(option[textKey], option[valueKey])"
                class="option" href="#">
                {{ option[textKey] }}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        // Props start here
        props: [
            // 'options', // This should be an ARRAY which contains the option values
            'placeholder', // Place Holder passed from parent
            'textKey', // The key of the JSON object which contains the text to be displayed in options
            'valueKey', // The key of the JSON object which contains the value to emitted to the parent component
            'defaultValue', // The default value of the select
            'defaultText', // The default text of the select
            'url',
            'name'
        ], // End of Props

        // Data starts here
        data: () => {
            return {
                text: '', // Holds the text of the select until validated
                value: '', // Holds the actual value of the select upon validation
                isVisible: false, // Toggles the visibilit of div#options
                options: Array
            }
        }, // End of Data

        // Computed starts here
        watch: {
            // whenever question changes, this function will run
            text: function () {
                this.getOptions();
            },
            value: function () {
                if (this.value == '') {
                    this.text = '';
                }
            }
        },

        // Methods start here
        methods: {
            // Sets the parameters as the actual value
            setActualValue(mt, mv) {
                this.text = mt;
                this.value = mv;
            },
            // Called when an option is selected
            setValueSelect(mt, mv) {
                // Set the params as actual values
                this.setActualValue(mt, mv)
                // Pass the value to the parent component
                this.$emit('input', this.value);
                // Hide the div#options
                this.hideOptions();
            },
            // Sets the isVisible to true
            showOptions() {
                this.isVisible = true;
            },
            // Sets the isVisible to false
            hideOptions() {
                this.isVisible = false;
            },
            // Get the options from the server
            getOptions() {
                axios.get(this.url, {
                    params: {
                        query: this.text
                    }
                }).then((response) => {
                    console.log(response.data);
                    this.options = response.data;
                });
            },
            handleInput(e) {
                this.$emit('input', this.value)
            }
        }, // End of Methods
        // Set the initial value of data here
        created() {
            // Check if the user passed default values
            if (this.defaultText && this.defaultValue) {
                // Set the props as the default data
                this.text = this.defaultText;
                this.value = this.defaultValue;
            }

            this.getOptions();
        }
    }

</script>

<style scoped>
    #options {
        width: 95%;
        background: white;
        border: 1px solid #d2d6de;
        list-style-type: none;
        /* Make the div#options scrollable */
        overflow: auto;
        max-height: 300px;
        position: absolute;
        z-index: 200;
    }

    .option {
        display: block;
        color: #818285;
        padding: 10px 15px 10px 15px;
    }

    .option:hover,
    .option:focus {
        background: #e3e5e7;
        color: #888888;
        outline: none;
    }

    .option:active {
        background: #dc3545;
        color: white;
    }

</style>
