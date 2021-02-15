<template>

    <div id="main">
        <div id="wrapper">

            <app-navbar></app-navbar>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <router-view />

            <app-footer></app-footer>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                //
            }
        },
        components: {
            //
        }
    }
</script>