<template>
    <input :name="name" type="checkbox" {{ checked :  }}>
</template>

<script>
    export default {
        props: {
            checked: Boolean,
            name: String,
            label: String
        },
        data: function () {
            return {}
        },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
