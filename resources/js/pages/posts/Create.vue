<template>
    <div>
        <header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">                
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>My Posts</h1>
                            <span class="subheading">All the posts created by me</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>Fill out the form below to create a new post</p>
                    <form>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" required v-model="form.body.title">
                                <p class="help-block text-danger" v-if="submitted && (!form.body.title)">Please enter the post title.</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Description</label>
                                <textarea rows="5" class="form-control" placeholder="Description" id="description" required v-model="form.body.description"></textarea>
                                <p class="help-block text-danger" v-if="submitted && (!form.body.description)">Please fill the post Description.</p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <button type="submit" class="btn btn-primary" @click.prevent="save()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                responseData: {},
                form: {
                    body: {
                        title: '',
                        description: ''
                    }
                },
                errors: {
                    title: false,
                    description: false
                },
                submitted: false
            }
        },
        validations: {
            form: {
                body: {

                }
            }
        },
        created() {

        },
        methods: {
            save() {
                this.submitted = true;
                this.form.body.title = this.form.body.title.trim();
                this.form.body.description = this.form.body.description.trim();
                if(this.form.body.title && this.form.body.description)
                this.axios.post('posts', this.form.body)
                        .then(data => {
                            this.$router.push({name: 'user-posts'});
                        });
            }
        }
    }
</script>