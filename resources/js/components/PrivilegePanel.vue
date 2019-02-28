<template>
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">User Privilege</h3>
            <p class="panel-subtitle">Manage what users can do here</p>
        </div>
        <div class="panel-body">
            <form method="POST" :action="'/user/' + user.id">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <h4 class="panel-title">User Management</h4>
                    </div>
                    <!--Admin checkbox-->
                    <div class="col-md-2">
                        <label class="fancy-checkbox" v-for="(privilege) in privilegeItems" :key="privilege.id">
                            <input type="checkbox" checked>
                            <span>{{ privilege.name.toUpperCase() }}</span>
                        </label>
                    </div>
                </div>

                <div class="form-group row" style="margin-top: 15px;">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Apply Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object,
            privilegeItems: Array
        },
        data: function () {
            return {}
        }
    }

</script>
