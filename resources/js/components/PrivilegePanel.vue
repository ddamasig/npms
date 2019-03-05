<template>
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">User Privilege</h3>
            <p class="panel-subtitle">Manage what users can do here</p>
        </div>
        <div class="panel-body">
            <form method="PUT" @submit="updatePrivileges">
                <div class="row">
                    <div class="col-sm-4 col-lg-3" style="margin-bottom: 10px;" v-for="(privilegeGroup) in privilegeGroups" :key="privilegeGroup.id">
                        <h4 class="panel-title" style="margin-bottom: 10px;">{{ privilegeGroup.name.toUpperCase() }}</h4>
                        <label class="fancy-checkbox" v-for="(privilegeItem) in privilegeGroup.privilege_items" :key="privilegeItem.id">
                            <input type="checkbox" :name="privilegeItem.id" v-model="originalUserPrivileges" :value="privilegeItem.id" />
                            <span>{{ privilegeItem.name.toUpperCase() }}</span>
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
        },
        data: function () {
            return {
                privilegeGroups: Array,
                userPrivileges: [],
                originalUserPrivileges: this.user.privileges.map(item => item.privilege_item_id),
                checkedPrivileges: Array,
            }
        },
        methods: {
            getPrivilegeGroups() {
                axios.get('/api/privilege_groups')
                    .then((response) => {
                        this.privilegeGroups = response.data;
                    });
            },
            isChecked(id) {
                let user_privileges = this.originalUserPrivileges
                // .map(item => item.privilege_item_id);
                if(user_privileges.includes(id))
                    return true;
                return false
            },
            updatePrivileges() {
                axios.put(`/user/${this.user.id}/privileges`, {
                        'originalUserPrivileges' : this.originalUserPrivileges
                    })
                    .then((response) => {
                        console.log(response);
                        // window.location.replace(`/user/${this.user.id}/edit?message=asdadasdasdasd&color=alert-success`);
                    })
            }
        },
        created() {
            this.getPrivilegeGroups();
            // this.getPrivilegeGroups();
        }
    }

</script>
