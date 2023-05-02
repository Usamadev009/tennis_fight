
<template>
    <div class="row parent-content">
        <div class="col-12">
            <div class="page-header">
                <h4 class="blocked-title">Blocked Users</h4>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" class="form-control float-right" placeholder="Search" v-model="blockedUserSearch">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <div v-if="response_message" id="successMessage" class="alert-message">
                        <div class="alert alert-success">
                            {{ response_message}}
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped mb-2">
                        <thead>
                            <tr>
                                <th># No.</th>
                                <th>Full Name</th>
                                <th>Membership</th>
                                <th>Contact #</th>
                                <th>Email</th>
                                <th>Member Since</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user,key) in users" :key="key">
                                <td>{{ user.id }}</td>
                                <td class="d-flex">
                                    <img class="user-image" v-bind:src="user.avatar" alt=""/>
                                    <a class="table-user-name">
                                        {{  user.fullName }}
                                    </a>
                                </td>
                                <td>Paid</td>
                                <td>{{ user.phoneNumber }}</td>
                                <td>{{ user.email }}</td>
                                <td>39-03-2023</td>
                                <td class="d-flex">
                                    <button type="button" @click="unblockUser(user.id)" class="btn btn-outline-dark btn-sm mr-1">
                                        <i class="fa fa-ban"></i>
                                        Unblock
                                    </button>
                                    <button type="button" @click="openModel(user)" class="btn btn-outline-dark btn-sm view-user-detail" data-toggle="modal" data-target="#right-sidebar-modal">
                                        <i class="fa fa-eye"></i>
                                        view
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="users && users.length == 0">
                                <td colspan="10" align="center">Data Not Found.</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination" v-if="users.length > 0">
                        <li v-if="pagination.current_page > 1">
                            <a class="btn" @click.prevent="getBlockedUser(pagination.current_page - 1)">
                            Prev
                            </a>
                        </li>
                        <li v-for="page in pagination.last_page" :key="page">
                            <a class="btn" @click.prevent="getBlockedUser(page)">
                            {{ page }}
                            </a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a class="btn" @click.prevent="getBlockedUser(pagination.current_page + 1)">
                            Next
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="right-side-bar">
        <div class="modal right fade" v-if="selectedUser" id="right-sidebar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <div class="image">
                            <img v-bind:src="selectedUser.avatar" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="user-info">
                            <p class="user-name">{{ selectedUser.fullName }}</p>
                            <p class="user-email">{{ selectedUser.email }}</p>
                            <p class="user-mobile">{{ selectedUser.phoneNumber }}</p>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body right-sidebar-multistep-modal">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-toggle="tab" href="#buying-history" role="tab">Buying History</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-2 pb-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="row pt-1 pl-3">
                                    <div class="col-6 pt-1">Gender</div>
                                    <div class="col-6 pt-1 text-right">{{ selectedUser.gender }}</div>
                                    <div class="col-5 pt-1">Experty Level</div>
                                    <div class="col-7 text-right pt-1"><hr></div>
                                    <div class="col-4">Single</div>
                                    <div class="col-8 text-right">3.0</div>
                                    <div class="col-4 pt-1">Double</div>
                                    <div class="col-8 pt-1 text-right">4.0</div>
                                    <div class="col-3 pt-1">Address</div>
                                    <div class="col-9 text-right pt-1"><hr></div>
                                    <div class="col-12">{{ selectedUser.completeAddress }}</div>
                                    <div class="col-6 pt-1">City</div>
                                    <div class="col-6 pt-1 text-right">{{ selectedUser.city }}</div>
                                    <div class="col-6 pt-1">State</div>
                                    <div class="col-6 pt-1 text-right">{{ selectedUser.state }}</div>
                                    <div class="col-6 pt-1">Country</div>
                                    <div class="col-6 pt-1 text-right">{{ selectedUser.country }}</div>
                                    <div class="col-6 pt-1">Emergency Contact</div>
                                    <div class="col-6 pt-1 text-right"><hr></div>
                                    <div class="col-4 pt-1">Full Name</div>
                                    <div class="col-8 pt-1 text-right">{{ selectedUser.emergencyContactName }}</div>
                                    <div class="col-4 pt-1">Relationship</div>
                                    <div class="col-8 pt-1 text-right">{{ selectedUser.emergencyContactRelation }}</div>
                                    <div class="col-4 pt-1">Phone#</div>
                                    <div class="col-8 pt-1 text-right">{{ selectedUser.emergencyContactNumber }}</div>
                                    <div class="col-4 pt-2">Bio</div>
                                    <div class="col-8 pt-2 text-right"><hr></div>
                                    <div class="col-12">{{ selectedUser.bio }}</div>
                                    <div class="col-12 p-4">
                                        <button type="button" class="btn btn-success btn-block">View Full Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="buying-history" role="tabpanel">
                                <div class="row pt-1 pl-3">
                                    <div class="col-12 pb-2">Bought Seasons</div>
                                    <div class="col-9">Winter 2019 Men Single 3.0</div>
                                    <div class="col-3 pt-1 text-right">$25</div>
                                    <div class="col-9 pt-1">Winter 2019 Men Double 3.0</div>
                                    <div class="col-3 pt-1 text-right">$50</div>
                                    <div class="col-9 pt-1">Fall 2018 Men Single 3.0</div>
                                    <div class="col-3 pt-1 text-right">$25</div>
                                    <div class="col-9 pt-1">Fall 2018 Men Double 3.0</div>
                                    <div class="col-3 pt-1 text-right">$50</div>
                                    <div class="col-12 pb-2 pt-5">
                                        <button type="button" class="btn btn-success btn-block">View All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Blocked_User',

        props: [],

        data(){
            return {
                users: [],
                response_message: '',
                blockedUserSearch: null,
                selectedUser: null,
                currentPage: '',
                pagination: {},
                // errors: [],
            }
        },

        watch: {
            blockedUserSearch(after, before) {
                this.searchBlockedUser();
            }
        },

        mounted(){
            this.getBlockedUser()
        },

        methods: {
            getBlockedUser(page)
            {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                this.currentPage = page;

                axios.get('blocked-user/list?page=' +page).then(response=>{
                    this.users = response.data.data;
                    this.pagination = response.data
                }).catch(error=>{
                    console.log(error)
                })
            },

            unblockUser(id) {
                if(confirm("Do you really want to unblock this user? When user is unblocked, he/she will not be able to use application.")){
                   axios.post(`blocked-user/unblock/${id}`).then(response=>{
                        this.getBlockedUser();
                        this.response_message = response.data.message;
                        $('#successMessage').show();
                        setTimeout(function() {
                            $('#successMessage').hide();
                        }, 5000);
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            },

            searchBlockedUser() {
                axios.get('blocked-user/search', { params: { blockedUserSearch: this.blockedUserSearch } }).then(response => {
                    this.users = response.data.users;
                }).catch(error => {
                    console.log(error);
                });
            },

            openModel(user) {
                this.selectedUser = user;
            },
        }
    }
</script>
<style scoped>
</style>
