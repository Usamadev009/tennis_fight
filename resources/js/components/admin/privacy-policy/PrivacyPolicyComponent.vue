
<template>
    <div class="row parent-content">
        <div class="col-12">
            <div class="page-header">
                <div class="title">
                    <h4>Privacy Policy</h4>
                </div>
            </div>
        </div>

        <div class="col-3"></div>
        <div class="col-6">
            <form @submit.prevent="create">
                <div v-if="response_message" id="successMessage">
                    <div class="alert alert-success">
                        {{ response_message}}
                    </div>
                </div>
                <div v-if="errors != 0" id="validationError">
                    <ul class="alert alert-danger">
                        <li v-for="(error, key) in errors" :key="key">{{ error[0] }}</li>
                    </ul>
                </div>
                Title
                <div class="card">
                    <h6 class="privacy-policy-title">
                        Privacy Policy
                    </h6>
                </div>
                Description
                <div class="">
                    <textarea id="summernote"
                        v-model="privacyPolicy"
                    >
                        Write the description
                    </textarea>
                </div>
                <div class="privacy-policy-btn">
                    <button type="button" class="btn btn-outline-dark col-5  mr-3">View</button>
                    <button type="submit" class="btn btn-success col-5 ml-3">Save</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</template>

<script>
    export default{
        name: 'Privacy_Policy',

        props: [],

        data(){
            return {
                privacyPolicy: '',
                is_edit: 1,
                errors: [],
                response_message: '',
            }
        },

        watch: {
        },

        mounted(){
            this.getPrivacyPolicy();
        },

        methods: {
            getPrivacyPolicy()
            {
                axios.post(`privacy-policy/edit/${this.is_edit}`).then(response=>{
                    this.privacyPolicy = response.data.privacyPolicy;
                    $('#summernote').summernote("code", this.privacyPolicy);
                }).catch(error=>{
                    console.log(error)
                })
            },

            create(){
                axios.post(`privacy-policy/update/${this.is_edit}`,{
                    privacyPolicy: $('#summernote').summernote('code'),
                }).then(response=>{
                    this.privacyPolicy = response.data.privacyPolicy;
                    this.response_message = response.data.message;
                    $('#successMessage').show();
                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 5000);
                }).catch(error=>{
                    this.errors = error.response.data.errors;
                })
            },
        }
    }

    $(function () {
        $('#summernote').summernote()
    })

</script>
<style scoped>
</style>
