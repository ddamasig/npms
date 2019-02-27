<template>
    <div :class="color" class="alert alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i>
         <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            color: String
        },
        data: function () {
            return {}
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

