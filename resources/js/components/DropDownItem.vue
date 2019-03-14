<template>
        <button class="list-group-item" v-if="!href">
            <span :class="icon"></span>
            <slot></slot>
        </button>
        <a class="list-group-item" :href="href" v-else>
            <span :class="icon"></span>
            <slot></slot>
        </a>
</template>

<script>
    export default {
        props: {
            icon: String,
            href: ''
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
