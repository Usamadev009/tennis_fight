
<template>
    <div class="row parent-content">
        <div class="col-12">
            <div class="page-header">
                <div class="title">
                    <h4>App Users</h4>
                </div>
                <div class="user-filter d-flex">
                    <div class="show-user">
                        <h4>Show Users:</h4>
                    </div>
                    <div class="dropdown">
                        <h4 class="btn">
                            All Users
                            <i class="right fas fa-angle-down pl-1"></i>
                        </h4>
                        <div class="dropdown-content">
                            <h6>All Users</h6><hr>
                            <h6>Paid Users</h6><hr>
                            <h6>Free Users</h6><hr>
                        </div>
                    </div>
                </div>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" class="form-control float-right" placeholder="Search" v-model="activeUserSearch"/>
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
                                    <p class="table-user-name">
                                        {{user.fullName }}
                                    </p>
                                </td>
                                <td>Paid</td>
                                <td>{{ user.phoneNumber }}</td>
                                <td>{{ user.email }}</td>
                                <td>39-03-2023</td>
                                <td class="d-flex">
                                    <button type="button" @click="deleteActiveUser(user.id)" class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a class="btn">
                                        <i class="fa fa-comment"></i>
                                    </a>
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
                            <a class="btn" @click.prevent="getActiveUser(pagination.current_page - 1)">
                            Prev
                            </a>
                        </li>
                        <li v-for="page in pagination.last_page" :key="page">
                            <a class="btn" @click.prevent="getActiveUser(page)">
                            {{ page }}
                            </a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a class="btn" @click.prevent="getActiveUser(pagination.current_page + 1)">
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
                                    <div class="col-6 pt-1">Available Credits</div>
                                    <div class="col-6 pt-1 text-right">$10.00</div>
                                    <div class="col-6 pt-1">Gender</div>
                                    <div class="col-6 pt-1 text-right">{{ selectedUser.gender }}</div>
                                    <div class="col-5 pt-1">Experty Level</div>
                                    <div class="col-7 text-right pt-1"><hr></div>
                                    <div class="col-4 pt-1">Single</div>
                                    <div class="col-8 text-right pt-1">3.0</div>
                                    <div class="col-4 pt-1">Double</div>
                                    <div class="col-8 pt-1 text-right">4.0</div>
                                    <div class="col-3 pt-1">Address</div>
                                    <div class="col-9 text-right pt-1"><hr></div>
                                    <div class="col-12 pt-1">{{ selectedUser.completeAddress }}</div>
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
        name: 'Active_User',

        props: [],

        data(){
            return {
                users: [],
                response_message: '',
                activeUserSearch: null,
                selectedUser: null,
                currentPage: '',
                pagination: {},
                // errors: [],
            }
        },

        watch: {
            activeUserSearch(after, before) {
                this.searchActiveUser();
            }
        },

        mounted(){
            this.getActiveUser()
        },

        methods: {

            getActiveUser(page)
            {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                this.currentPage = page;

                axios.get('active-user/list?page=' +page).then(response=>{
                    this.users = response.data.data;
                    this.pagination = response.data
                }).catch(error=>{
                    console.log(error)
                })
            },

            deleteActiveUser(id) {
                if(confirm("Are you sure to delete this data ?")){
                   axios.post(`active-user/delete/${id}`).then(response=>{
                        this.getActiveUser();
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

            searchActiveUser() {
                axios.get('active-user/search', { params: { activeUserSearch: this.activeUserSearch } }).then(response => {
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
