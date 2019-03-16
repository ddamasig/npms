<template>
    <form method="POST" @submit.prevent="submit('post')">
        <input type="hidden" name="project_id" v-model="model.project_id">
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Module Name</label>
            <div class="col-md-10">
                <input id="name" v-model="model.name" type="text" class="form-control" name="name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
            <div class="col-md-10">
                <textarea rows="8" v-model="model.description" id="description" type="text" class="form-control" name="description"
                    required autofocus>
                </textarea>
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
            modalId: String,
            defaultProjectId: [String, Number]
        },
        data() {
            return {
                model: {
                    name: '',
                    description: '',
                    project_id: this.defaultProjectId
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
            submit() {
                // Send an Axios POST Request
                axios.post('/modules', this.model)
                    .then((response) => {
                        // If the server returns a 200 response
                        if (response.status == 200) {
                            // Tell the alert that the post request was a success
                            Event.$emit('post', {
                                message: 'Module successfully created!'
                            });
                            // Tell the module list to update the items
                            Event.$emit('updateModuleList');
                            // Clear the form
                            this.clearForm();
                        } else { // Else an error has occured
                            // Tell the alert that an error has occured
                            this.$emit('error', {
                                message: 'Module successfully created!'
                            });
                        }
                    }); // End of Axios Request
                // Hide modal
                $(`#${this.modalId}`).modal('hide');
            }, // End of submit()
        }
    }

</script>
