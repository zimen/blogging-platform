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
            <div class="clearfix">
                <router-link  :to="{ name : 'new-post' }" class="btn btn-primary float-right">                        
                    + New Post
                </router-link>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview" v-for="post in posts">
                        <a href="#">
                            <h3 class="post-title">
                                {{post.title}}
                            </h3>                        
                        </a>
                        <h4 class="post-subtitle">
                            {{post.description}}
                        </h4>
                        <p class="post-meta">Posted on
                            {{post.publication_date}}</p>
                        <hr>
                    </div>

                    <!-- Pager -->
                    <div class="clearfix">
                        <pagination :data="responseData" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getResults();
        },
        data() {
            return {
                responseData: {},
                posts: [],
            }
        },
        created() {

        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                this.axios.get('myposts?page=' + page)
                        .then(data => {
                            this.responseData = data.data;
                            this.posts = data.data.data;
                            console.log(this.posts)
                        });
            }
        }
    }
</script>