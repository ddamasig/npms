<template>
    <tr>
        <td>{{ task.id }}</td>
        <td>{{ task.name}}</td>
        <td>{{ task.developer.full_name }}</td>
        <td>{{ task.status }}</td>
        <td>
            <drop-down-button name="Actions" btn-link="false">
                <drop-down-item icon="lnr lnr-checkmark-circle" @click.native="markAsFinished">
                    Mark as Finished
                </drop-down-item>
                <drop-down-item icon="lnr lnr-pencil" data-toggle="modal" data-target="#task-form-edit-modal">
                    Edit
                </drop-down-item>
                <drop-down-item icon="lnr lnr-trash" @click.native="destroy()">
                    Delete
                </drop-down-item>
            </drop-down-button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            task: Object,
        },
        data() {
            return {}
        },
        methods: {
            destroy() {
                axios.delete('/api/tasks/' + this.task.id).
                then(function (response) {
                    if (response.status == 200) {
                        Event.$emit('delete', {
                            message: 'Task successfully deleted!',
                        });
                        Event.$emit('updateTasks');
                        Event.$emit('updateModuleList');
                    } else {
                        this.$emit('error', {
                            message: 'An error has occurred!'
                        });
                    }
                })
            },
            markAsFinished() {
                // Send an Axios POST Request
                axios.get('/api/tasks/mark_as_finished/' + this.task.id)
                    .then((response) => {
                        // If the server returns a 200 response
                        if (response.status == 200) {
                            // Tell the alert that the post request was a success
                            Event.$emit('put', {
                                message: 'Task successfully marked as finished!'
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
            }
        }
    }
</script>
