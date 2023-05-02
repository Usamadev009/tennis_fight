
<template>
    <div class="row parent-content">
        <div class="col-12">
            <div class="page-header">
                <h4 class="deleted-title">Deleted Users</h4>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" class="form-control float-right" placeholder="Search" v-model="deletedUserSearch">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped mb-2">
                        <thead>
                            <tr>
                                <th># No.</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user,key) in users" :key="key">
                                <td>{{ user.id }}</td>
                                <td>{{ date(user.deleted_at)+user.fullName.trim().replace(/\s+/g, '') + year(user.deleted_at) }}</td>
                                <td>{{ user.deleted_at }}</td>
                            </tr>
                            <tr v-if="users && users.length == 0">
                                <td colspan="10" align="center">Data Not Found.</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination" v-if="users.length > 0">
                        <li v-if="pagination.current_page > 1">
                            <a class="btn" @click.prevent="getDeletedUser(pagination.current_page - 1)">
                            Prev
                            </a>
                        </li>
                        <li v-for="page in pagination.last_page" :key="page">
                            <a class="btn" @click.prevent="getDeletedUser(page)">
                            {{ page }}
                            </a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a class="btn" @click.prevent="getDeletedUser(pagination.current_page + 1)">
                            Next
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default{
        name: 'Deleted_User',

        props: [],

        data(){
            return {
                users: [],
                deletedUserSearch: null,
                currentPage: '',
                pagination: {},
            }
        },

        watch: {
            deletedUserSearch(after, before) {
                this.searchDeletedUser();
            }
        },

        mounted(){
            this.getDeletedUser()
        },

        methods: {
            getDeletedUser(page)
            {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                this.currentPage = page;

                axios.get('deleted-user/list?page=' +page).then(response=>{
                    this.users = response.data.data;
                    this.pagination = response.data
                }).catch(error=>{
                    console.log(error)
                })
            },

            searchDeletedUser() {
                axios.get('deleted-user/search', { params: { deletedUserSearch: this.deletedUserSearch } }).then(response => {
                    this.users = response.data.users;
                }).catch(error => {
                    console.log(error);
                });
            },

            date(value) {
                return moment(value).format('DD');
            },

            year(value) {
                return moment(value).format('YYYY');
            }
        }
    }
</script>
<style scoped>
</style>
