<template>
    <form method="POST" :action="action">
        <input type="hidden" name="_method" :value="method">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="project_id" :value="projectId">
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Module Name</label>
            <div class="col-md-10">
                <input id="name" type="text" class="form-control" name="name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
            <div class="col-md-10">
                <textarea rows="8" id="description" type="text" class="form-control" name="description" required
                    autofocus>
                </textarea>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Confirm
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: {
            action: String,
            csrf: String,
            method: String,
            projectId: null,
        },
    }

</script>
