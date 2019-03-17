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
                <select-search url="/api/users" v-model="model.developer_id" name="manager_id" text-key="full_name" value-key="id"></select-search>
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
            defaultModuleId: [String, Number]
        },
        data() {
            return {
                model: {
                    name: '',
                    module_id: this.defaultModuleId,
                    developer_id: '',
                    status: 'pending'
                }
            }
        },
        created() {
            Event.$on('changeActiveModule', (data) => {
                this.setValues(data.module);
            });
        },
        methods: {
            // Clear all the v-models
            clearForm() {
                this.model.name = '';
                this.model.description = '';
                this.model.developer_id = '';
            },
            // Submits the form using Axios
            submit() {
                // Send an Axios POST Request
                axios.post('/api/tasks', this.model)
                    .then((response) => {
                        console.log('Task created: ');
                        console.log(this.model);
                        // If the server returns a 200 response
                        if (response.status == 200) {
                            // Tell the alert that the post request was a success
                            Event.$emit('post', {
                                message: 'Task successfully created!'
                            });
                            // Tell the module list to update the items
                            Event.$emit('updateTasks');
                            Event.$emit('updateModuleList');
                            // Clear the form
                            this.clearForm();
                        } else { // Else an error has occured
                            // Tell the alert that an error has occured
                            this.$emit('error', {
                                message: 'An error has occurred!'
                            });
                        }
                    }); // End of Axios Request
                // Hide modal
                $(`#${this.modalId}`).modal('hide');
            }, // End of submit()
            // Set the module_id
            setValues(module) {
                this.model.module_id = module.id;
            }
        }
    }

</script>
