<template>
    <div class="row parent-content pt-4">
        <div class="col-12 manage-administration">
            <ul class="nav nav-tabs pl-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="admin-user-tab" data-toggle="tab" href="#adminUser" role="tab">Admin Users</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="admin-roles-tab" data-toggle="tab" href="#adminRoles" role="tab">Admin Roles</a>
                </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="adminUser" role="tabpanel">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="col-9">
                                    <h4>
                                        Admin Users
                                        <a class="btn btn-success ml-3 mb-2">+ Add Admin</a>
                                    </h4>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Search"/>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <a>Admins</a>
                                    <table class="table table-hover table-striped mb-2">
                                        <thead>
                                            <tr>
                                                <th># No.</th>
                                                <th>Full Name</th>
                                                <th>Role</th>
                                                <th>Contact #</th>
                                                <th>Email</th>
                                                <th>Member Since</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>00001</td>
                                                <td class="d-flex">
                                                    <img class="user-image" alt=""/>
                                                    <p class="table-user-name">
                                                        John Deo
                                                    </p>
                                                </td>
                                                <td>Admin</td>
                                                <td>222222222222</td>
                                                <td>user@gmail.com</td>
                                                <td>11/04/2023</td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail" data-toggle="modal" data-target="#adminProfile">
                                                        <i class="fa fa-eye"></i>
                                                        Edit Profile
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>00001</td>
                                                <td class="d-flex">
                                                    <img class="user-image" alt=""/>
                                                    <p class="table-user-name">
                                                        John Deo
                                                    </p>
                                                </td>
                                                <td>Regional Admin</td>
                                                <td>222222222222</td>
                                                <td>user@gmail.com</td>
                                                <td>11/04/2023</td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail" data-toggle="modal" data-target="#adminProfile">
                                                        <i class="fa fa-eye"></i>
                                                        Edit Profile
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- <tr v-if="users && users.length == 0">
                                                <td colspan="10" align="center">Data Not Found.</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <!-- <ul class="pagination" v-if="users.length > 0">
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
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="adminRoles" role="tabpanel">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="col-9">
                                    <h4>
                                        Admin Roles
                                        <a class="btn btn-success ml-3 mb-2">+ Add Role</a>
                                    </h4>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Search"/>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <a>Admins</a>
                                    <table class="table table-hover table-striped mb-2">
                                        <thead>
                                            <tr>
                                                <th># No.</th>
                                                <th>Role Title</th>
                                                 <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>00001</td>
                                                <td>Admin</td>
                                                 <td class="d-flex">
                                                    <button type="button" class="btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail mr-2">
                                                        View Permissions
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail">
                                                        Edit Role
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>00001</td>
                                                <td>Regional Admin</td>
                                                 <td class="d-flex">
                                                    <button type="button" class="btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail mr-2">
                                                        View Permissions
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm view-user-detail">
                                                        Edit Role
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- <tr v-if="users && users.length == 0">
                                                <td colspan="10" align="center">Data Not Found.</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <!-- <ul class="pagination" v-if="users.length > 0">
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
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade"  id="adminProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" v-model="firstName" id="firstName" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" v-model="lastName" id="lastName" placeholder="Enter Second Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" v-model="email" id="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" v-model="gender">
                                            <option>{{ gender }}</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" v-model="completeAddress" id="address" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" v-model="country" v-on:change="getStates($event.target.value)">
                                            <option >{{ country }}</option>
                                            <option v-for="(countrie,key) in countries" :key="key" :value="countrie">{{ countrie }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control" v-model="state">
                                            <option>{{ state }}</option>
                                            <option v-for="(stat,key) in states" :key="key" :value="stat">{{ stat }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="postalCode">Postal Code</label>
                                        <input type="text" class="form-control" v-model="postalCode" id="postalCode" placeholder="Enter Postal Code">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phoneNumber">Contact Number</label>
                                        <input type="text" class="form-control" v-model="phoneNumber" id="phoneNumber" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Manage_Administration',

        props: [
        ],

        data(){
            return {

            }
        },

        watch: {
        },

        mounted(){
        },

        methods: {


        }
    }
</script>
<style scoped>
</style>
