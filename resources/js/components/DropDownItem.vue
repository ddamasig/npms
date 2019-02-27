<template>
    <a class="list-group-item" :href="href">
        <span :class="icon"></span>
        <slot></slot>
    </a>
</template>

<script>
    export default {
        props: {
            href: String,
            icon: String
        },
        data: function() {
            return {
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
