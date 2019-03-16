<template>
    <a id="root" href="#" :class="{'active' : active == 'true' }" class="list-group-item list-group-item-action flex-column align-items-start">
        <div style="display: block; margin-bottom: 10px">
            <h5 style="display:inline;" class="mb-1">
                {{ module.name }}
            </h5>
            <span style="float: right;">
                <drop-down-button name="" btn-link="true" icon="fa fa-ellipsis-v">
                    <drop-down-item icon="lnr lnr-pencil" href="#" data-toggle="modal" data-target="#module-form-edit-modal">
                        Edit
                    </drop-down-item>
                    <form method="POST" @submit.prevent="destroy()">
                        <drop-down-item type="submit" icon="lnr lnr-trash">
                            Delete
                        </drop-down-item>
                    </form>
                </drop-down-button>
            </span>
        </div>
        <small class="mb-1" style="display: block; margin-bottom: 10px">
            {{ module.description.substring(0,100) }}...
        </small>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" :aria-valuenow="module.progress"
                aria-valuemin="0" aria-valuemax="100" :style="'width: ' + module.progress + '%;'">
            </div>
        </div>
        <small>
            <span class="label label-primary" v-for="developer in module.developers" :key="developer.id">
                {{ developer.initials }}
            </span>
        </small>
    </a>
</template>

<style scoped>
    #root {
        margin-bottom: 5px;
    }

    .active {
        background-color: white;
        color: #555;
    }

    .active:hover,
    .active:visited,
    .active:focus {
        background-color: white;
        color: #555;
    }

</style>


<script>
    export default {
        props: {
            module: Object,
            active: String,
        },
        data() {
            return {
                destroy() {
                    axios.delete('/modules/' + this.module.id).
                    then(function (response) {
                        if (response.status == 200) {
                            Event.$emit('delete', {
                                message: 'Module successfully deleted!',
                            });
                            Event.$emit('updateModuleList', {
                                message: 'Module successfully deleted!',
                            });
                        } else {
                            this.$emit('error', {
                                message: 'Module successfully created!'
                            });
                        }
                    })
                }
            }
        },
    }

</script>
