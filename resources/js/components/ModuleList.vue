<template>
    <div class="list-group" style="border-radius: 0px;">
        <div v-for="module in modules" :key="module.id" @click="setActiveModule(module)">
            <module-list-item v-if="module.id == activeModule.id" active="true" :module="module">
            </module-list-item>
            <module-list-item v-else active="false" :module="module">
            </module-list-item>
        </div>
        <!-- Modals -->
        <Modal title="Edit Module" id="module-form-edit-modal">
            <module-form-edit :module="activeModule"></module-form-edit>
        </Modal>
    </div>
</template>

<script>
    export default {
        props: {
            project: Object
        },
        data() {
            return {
                activeModule: this.project.modules[0],
                modules: this.updateModuleList()
            }
        },
        created() {
            Event.$on('updateModuleList', (data) => {
                this.updateModuleList();
            });
        },
        methods: {
            updateModuleList() {
                axios.get('/api/modules/by_project/' + this.project.id).
                then((response) => {
                    this.modules = response.data.modules;
                });
            },
            setActiveModule(module) {
                this.activeModule = module;
                Event.$emit('changeActiveModule', {
                    module: module,
                });
            },
        }
    }

</script>
