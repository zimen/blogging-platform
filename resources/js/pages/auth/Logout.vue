<template>
    <div>
        <p>Login out ...</p>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {

        },
        created() {
            localStorage.clear();
            this.$router.push({name: 'auth-login'});
        },
        methods: {
            logout() {
                this.axios.post('auth/logout')
                        .then(data => {
                            localStorage.clear();
                            this.$router.push({name: 'auth-login'});
                        });
            }
        }
    }
</script>