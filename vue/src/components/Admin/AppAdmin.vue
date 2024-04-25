<template>
    <div>
        <AppAdminLayout  class="header"/>
        <main class="d-flex">
            <AppAdminAside class="aside"/>
            <div class="content pt-4">
                <router-view></router-view>
            </div>
            
        </main>
        
    </div>
</template>
<script>
    import AppAdminLayout from './AppAdminLayout.vue';
    import AppAdminAside from './AppAdminAside.vue';
    export default {
        components:{
            AppAdminLayout,
            AppAdminAside
        },
    }
</script>
<style>
    .header{
        position: relative !important;
        z-index: 10000000 !important;
    }
    .aside{
        height: 90.5vh !important;
    }
    .content{
        height: 90.5vh !important;
        overflow-y: scroll !important;
        width: 100% !important;
        margin-left: 30px;
        box-shadow: 2px 20px 30px rgba(211, 211, 211, 0.39);

    }
    .content::-webkit-scrollbar{
        display: none;
    }
    @media screen and (max-width: 1250px) {
        .content{
            margin-left: 0 !important;
        }

        
    }
</style>
