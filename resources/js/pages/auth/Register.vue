<template>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">                                
                                <p class="text-muted mb-4 mt-3">Please fill the following form to create an account</p>
                            </div>

                            <form autocomplete="off" @submit.prevent="register" method="POST">

                                <div class="form-group mb-3">
                                    <label for="utilisateur">Name</label>
                                    <input class="form-control" type="text" id="utilisateur" placeholder="Your Name" v-model="name" required>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="utilisateur">Email</label>
                                    <input class="form-control" type="email" id="utilisateur" placeholder="Your Email" v-model="email" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" placeholder="Your Password" v-model="password" required>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fe-airplay"></i>
                                        <span> Register</span>
                                    </button>

                                </div>

                            </form>



                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
</template>

<script>
    export default {
        data() {
            return {
                email: null,
                password: null,
                name: null
            }
        },

        mounted() {
            //
        },

        methods: {
            register() {
                // get the redirect object
                var redirect = this.$auth.redirect()
                var app = this;
                this.$auth.register({
                    data: {
                        email: app.email,
                        name: app.name,
                        password: app.password
                    },
                    redirect: {name: 'site-home'},                    
                    success: function () {
                        
                        //this.$router.push({name: redirectTo})
                    },
                    error: function () {
                        
                    },
                    staySignedIn: true,
                    fetchUser: true
                })
                .then((res) => {                    
                        this.$auth.remember(JSON.stringify({
                                name: this.$auth.user().name
                            }));

                        this.$router.push({name: 'site-home'});
                    }, (res) => {
                        this.errors(
                            res.response || // Axios
                            res             // VueResource
                        );
                    })
            }
        }
    }
</script>
