<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tasks Name</th>
                    <th>Developer</th>
                    <th>Status</th>
                    <th class="text-right">
                        <a href="#" data-toggle="modal" data-target="#task-form-modal" class="lnr lnr-plus-circle"></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <task-row v-for="task in tasks" :key="task.id" :task="task" @click.native="setActiveTask(task)">
                </task-row>
            </tbody>
        </table>

        <!-- Modals -->
        <Modal title="Create New Task" id="task-form-modal">
            <task-form modal-id="task-form-modal"></task-form>
        </Modal>
        <Modal title="Edit Task" id="task-form-edit-modal">
            <task-form-edit modal-id="task-form-edit-modal" :default-task="activeTask"></task-form-edit>
        </Modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: Array,
                activeTask: Object,
                module: Object,
            }
        },
        methods: {
            updateTasks() {
                axios.get('/api/tasks/by_module/' + this.module.id).
                then((response) => {
                    this.tasks = response.data.tasks;
                });
            },
            setActiveTask(task) {
                this.activeTask = task;
                Event.$emit('changeActiveTask', {
                    task: task,
                })
            },
            setActiveModule(module) {
                this.module = module;
            }
        },
        created() {
            Event.$on('changeActiveModule', (data) => {
                this.setActiveModule(data.module);
                this.updateTasks();
            });

            Event.$on('updateTasks', (data) => {
                this.updateTasks();
            });

        },
    }

</script>
