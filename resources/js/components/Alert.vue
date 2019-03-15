<template>
    <div v-if="message != ''" :class="color" class="alert alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
        <i class="fa" :class="icon"></i>
         {{ message }}
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                color: String,
                message: '',
                icon: String,
            }
        },
        created() {
            Event.$on('post', (data) => {
                this.message = data.message;
                this.color = 'alert-success';
                this.icon = 'fa-check-circle';
            });
            Event.$on('put', (data) => {
                this.message = data.message;
                this.color = 'alert-success';
                this.icon = 'fa-check-circle';
            });
            Event.$on('delete', (data) => {
                this.message = data.message;
                this.color = 'alert-success';
                this.icon = 'fa-trash';
            });
        }
    }
</script>

