<template>
    <div class="list-group" style="border-radius: 0px; padding-right: 5px;">
        <div v-for="module in modules" :key="module.id" @click="setActiveModule(module)">
            <module-list-item v-if="module.id == activeModule.id" active="true" :module="module">
            </module-list-item>
            <module-list-item v-else active="false" :module="module">
            </module-list-item>
        </div>
        <!-- Modals -->
        <Modal title="Edit Module" id="module-form-edit-modal">
            <module-form-edit modal-id="module-form-edit-modal" :default-module="activeModule"></module-form-edit>
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
        mounted() {
            Event.$on('updateModuleList', (data) => {
                this.updateModuleList();
            });
            this.setActiveModule(this.activeModule);
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


<style>
    /* width */
    ::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgb(124, 124, 124);
    }

    .scrollable-div {
        height: 250px;
        overflow-y: scroll;
    }

    @media (min-width: 576px) {}

    @media (min-width: 768px) {
        .scrollable-div {
            height: 350px;
            overflow-y: scroll;
        }
    }

    @media (min-width: 992px) {
        .scrollable-div {
            height: 350px;
            overflow-y: scroll;
        }
    }

    @media (min-width: 1200px) {
        .scrollable-div {
            height: 370px;
            overflow-y: scroll;
        }
    }

</style>
