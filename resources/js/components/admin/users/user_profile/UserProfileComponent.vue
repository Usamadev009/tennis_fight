
<template>
    <div class="row parent-content pt-4 d-flex">
        <div class="col-4">
            <div class="card">
                <div class="card-body profile-card-body">
                    <div class="admin-profile text-center">
                        <img v-bind:src="user.avatar" class="rounded-circle pb-3" alt="Admin Profile"><br>
                        <h5>{{ user.fullName }}</h5>
                    </div>
                    <div class="row admin-record">
                        <div>
                            <h6>Member Since</h6>
                            <h6>User ID</h6>
                            <h6>Admin Role</h6>
                        </div>
                        <div>
                            <h6>04/10/2023</h6>
                            <h6>0000{{ user.id }}</h6>
                            <h6 style="text-transform: capitalize;">{{ user.role }}</h6>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#adminProfile">Edit Profile</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body profile-card-body">
                    <p class="profile-detail">Profile Details</p>
                    <div class="row admin-profile-detail">
                        <div>
                            <h6>Phone #</h6>
                            <h6>Email</h6>
                            <h6>Gender</h6>
                            <h6>Address</h6>
                            <h6>Postal Code</h6>
                            <h6>State</h6>
                            <h6>Country</h6>
                        </div>
                        <div>
                            <h6>{{ user.phoneNumber }}</h6>
                            <h6>{{ user.email }}</h6>
                            <h6 style="text-transform: capitalize;">{{ user.role }}</h6>
                            <h6>{{ user.completeAddress }}</h6>
                            <h6>{{ user.postalCode }}</h6>
                            <h6>{{ user.state }}</h6>
                            <h6>{{ user.country }}</h6>
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
</template>

<script>
    export default{
        name: 'User_Profile',

        props: [
        ],

        data(){
            return {
                country: '',
                state: '',
                user: '',
                firstName: '',
                lastName: '',
                email: '',
                gender: '',
                completeAddress: '',
                postalCode: '',
                phoneNumber: '',
                avatar: '',
                countries: [],
                states: [],
            }
        },

        watch: {
        },

        mounted(){
            this.getAdmin();
        },

        methods: {

            getAdmin()
            {
                axios.get('admin-data').then(response=>{
                    this.user = response.data.user;
                    this.email = response.data.user.email;
                    this.gender = response.data.user.gender;
                    this.completeAddress = response.data.user.completeAddress;
                    this.postalCode = response.data.user.postalCode;
                    this.phoneNumber = response.data.user.phoneNumber;
                    this.country = response.data.user.country;
                    this.state = response.data.user.state;
                    this.countries = response.data.countries;
                    console.log(this.countries);
                }).catch(error=>{
                    console.log(error)
                })
            },

            getStates(name)
            {
                console.log(name);
                axios.post(`get-states/${name}`).then(response=>{
                    this.states = response.data.states;
                    console.log(this.states);
                }).catch(error=>{
                        console.log(error)
                })
            },
        }
    }
</script>
<style scoped>
</style>
