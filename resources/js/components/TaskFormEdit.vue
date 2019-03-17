<template>
    <form method="POST" @submit.prevent="submit()">
        <input type="hidden" name="project_id" v-model="model.module_id">
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Task Name</label>
            <div class="col-md-10">
                <input id="name" v-model="model.name" type="text" class="form-control" name="name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label text-md-right">Developer</label>
            <div class="col-md-10">
                <select-search url="/api/users" v-model="model.developer_id" name="manager_id" text-key="full_name"
                    value-key="id"></select-search>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Confirm
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            modalId: String
        },
        data() {
            return {
                task: Object,
                model: {
                    name: String,
                    developer_id: String,
                    module_id: String,
                }
            }
        },
        methods: {
            // Clear all the v-models
            clearForm() {
                this.model.name = '';
                this.model.description = '';
            },
            // Submits the form using Axios
            submit(method) {
                // Send an Axios POST Request
                axios.put('/api/tasks/' + this.task.id, this.model)
                    .then((response) => {
                        // If the server returns a 200 response
                        if (response.status == 200) {
                            // Tell the alert that the post request was a success
                            Event.$emit('put', {
                                message: 'Task successfully updated!'
                            });
                            // Tell the module list to update the items
                            Event.$emit('updateTasks');
                        } else { // Else an error has occured
                            // Tell the alert that an error has occured
                            this.$emit('error', {
                                message: 'An error has occured!'
                            });
                        }
                    }); // End of Axios Request
                // Hide the modal
                $(`#${this.modalId}`).modal('hide')
            }, // End of submit()
            // setValuesialize the default values of MODULE
            setValues() {
                this.model.name = this.task.name;
                this.model.developer_id = this.task.developer_id;
                this.model.module_id = this.task.module_id;
            }
        },
        created() {
            // Change the form data based on the ACTIVEMODULE on ModuleList.vue
            Event.$on('changeActiveTask', (data) => {
                this.task = data.task;
                this.setValues();
            })
            // setValuesialize
            this.setValues();
        }
    }

</script>
