<template>
    <div style="width: 60%; margin: auto; margin-top: 5%;" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        :id="id" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="panel" abindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="panel-heading">
                <h3 class="panel-title">{{ title }}</h3>
                <div class="right">
                    <button type="button" data-dismiss="modal" aria-label="Close"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <!-- Content goes here -->
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        id: String,
    },
    data() {
        return {
        }
    }
}
</script>

