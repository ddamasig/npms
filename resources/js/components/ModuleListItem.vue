<template>
    <a style="border-radius: 0px;" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="">
            <h5 style="display:inline;" class="mb-1">{{ module.name }}</h5>
            <span style="float: right;">
                <button style="padding: 0px;" class="btn-link text-primary"><i class="lnr lnr-pencil"></i></button>
                <button style="padding: 0px;" class="btn-link text-danger"><i class="lnr lnr-trash"></i></button>
            </span>
        </div>
        <small class="mb-1" style="display: block; margin-bottom: 10px">{{ module.description }}...</small>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" :aria-valuenow="module.progress"
                aria-valuemin="0" aria-valuemax="100" :style="'width: ' + module.progress + '%;'">
            </div>
        </div>
        <small>
            <span class="label label-primary">INFO</span>
            <span class="label label-primary">INFO</span>
            <span class="label label-primary">INFO</span>
            <span class="label label-primary">INFO</span>
            <span class="label label-primary">INFO</span>
        </small>
    </a>
</template>


<script>
export default {
    props: [
        'module',
    ],
    data() {
        return {
        }
    }
}
</script>
