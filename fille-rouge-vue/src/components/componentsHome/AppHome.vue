<template>
    <div class="sectionHome pe-4">
        <section class="container-mf p-4 checkAuth d-flex justify-content-between align-items-center" style="background: #121419;">
            <div class="infoText d-flex flex-column gap-3">
                <span class="h1 fw-bold" style="color: #AEAEAE;">Share & grow the world's knowledge!</span>
                <p class="text-secondary">We want to connect the people who have knowledge to the people who need it, to bring 
                together people with different perspectives so they can understand each other better,
                and to empower everyone to share their knowledge.</p>
                <router-link to='/SignUp' class="btn btn-primary w-50">Create A New Account</router-link>
            </div>
            <img src="../../assets/img/auth.png" id="imageAuth" width="40%" class="p-3" alt="Image">
        </section>
        <section class="mt-4 container-mf">
fff
        </section>
       
    </div>
</template>
<script>
    export default{
        name: 'AppHome',
    }
</script>
<style>
</style>