
<template>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">                    
                    <router-link  :to="{ name : 'site-home' }" class="nav-link">                        
                        Home
                    </router-link>
                    </li>
                    <li class="nav-item" v-if="$auth.check()">
                    <router-link  :to="{ name : 'user-posts' }" class="nav-link">                        
                        My Posts
                    </router-link>                    
                    </li>
                    <li class="nav-item" v-if="$auth.check()">
                        <router-link  :to="{ name : 'auth-logout' }" class="nav-link">                        
                        Logout
                    </router-link>
                    </li>
                    <li class="nav-item" v-if="!$auth.check()">
                        <router-link  :to="{ name : 'auth-login' }" class="nav-link">                        
                        Login
                    </router-link>
                    </li>
                    <li class="nav-item" v-if="!$auth.check()">
                        <router-link  :to="{ name : 'auth-register' }" class="nav-link">                        
                        Register
                    </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>