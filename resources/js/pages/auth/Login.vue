<template>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">                                
                                <p class="text-muted mb-4 mt-3">Please fill the following for to log in</p>
                            </div>

                            <form autocomplete="off" @submit.prevent="login" method="POST">
                                <p class="help-block text-danger" v-if="has_error">Invalid Credentials.</p>
                                <div class="form-group mb-3">
                                    <label for="utilisateur">Email</label>
                                    <input class="form-control" type="email" id="utilisateur" placeholder="Saisissez votre nom d'utilisateur." v-model="email" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" placeholder="Saisissez votre mot de passe." v-model="password" required>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fe-airplay"></i>
                                        <span> Login</span>
                                    </button>                                    
                                </div>

                            </form>
                            No account yet ? please
                            <router-link  :to="{ name : 'auth-register' }" class="nav-link">                        
                                Register
                            </router-link>                            
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
                has_error: false
            }
        },

        mounted() {
            //
        },

        methods: {
            login() {
                console.log("login start...")
                // get the redirect object
                var redirect = this.$auth.redirect()
                var app = this
                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password
                    },
                    //redirect: {name: 'site-home'},
                    success: function () {

                        // handle redirection
                        // this.$auth.user(data.user);
                        //const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : 'dashboard'

                        //this.$router.push({name: redirectTo})
                    },
                    error: function () {
                        app.has_error = true
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
                            this.has_error = true;
                        })
            }
        }
    }
</script>
