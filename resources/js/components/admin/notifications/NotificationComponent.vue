
<template>
    <div class="row parent-content">
        <div class="col-12">
            <div class="page-header">
                <div class="title d-flex">
                    <h4>Notifications</h4>
                    <div class="pl-5">
                        <button type="button" class="btn btn-success">+ NewNotifications</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <!-- <div v-if="response_message" id="successMessage" class="alert-message">
                        <div class="alert alert-success">
                            {{ response_message}}
                        </div>
                    </div> -->
                </div>
                <div class="card-body table-responsive">
                    <p>Sent Notifications</p>
                    <table class="table table-hover table-striped mb-2">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Notification Title</th>
                                <th>Notifications</th>
                                <th>Device</th>
                                <th>User Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>Andriod</td>
                                <td>Paid</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>IOS</td>
                                <td>Free</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>Andriod</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>04/06/2023 10:58AM</td>
                                <td>Ending Season Winter 2023</td>
                                <td>Lorem ipsum Sed ut orem ipsum Set ut...</td>
                                <td>All</td>
                                <td>All</td>
                                <td class="d-flex">
                                    <button type="button" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button"  class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td colspan="10" align="center">Data Not Found.</td>
                            </tr> -->
                        </tbody>
                    </table>
                    <!-- <ul class="pagination">
                        <li>
                            <a class="btn">
                            Prev
                            </a>
                        </li>
                        <li>
                            <a class="btn">
                                Page
                            </a>
                        </li>
                        <li>
                            <a class="btn">
                            Next
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Notifications',

        props: [],

        data(){
            return {
                // users: [],
                // response_message: '',
                // currentPage: '',
                // pagination: {},
                // errors: [],
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
