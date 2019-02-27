<template>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            {{ name }}
        </button>
        <div class="dropdown-menu" style="height: 0px; padding: 0px;" aria-labelledby="dropdownMenuButton">
            <ul class="list-group">
                <slot></slot>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: ''
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

