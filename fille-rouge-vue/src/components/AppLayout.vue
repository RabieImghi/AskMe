<template>
    <div class="content d-flex justify-content-between align-items-center headerLayout shadow-mdf container-mf">
        <div class="logo">
            <router-link to="/">
                <img src="../assets/img/logo.png" width="110px" alt="">
            </router-link> 
        </div>
        <nav class="navigationLayout mt-2">
            <ul class="d-flex gap-4 list-unstyled ">
                <li><router-link class="nav-link" to="/">Home</router-link></li>
                <li><router-link class="nav-link" to="/AboutUs">About Us</router-link></li>
                <li class="nav-item dropdown ">
                    <router-link class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false" to="/Servises">Services</router-link>
                    <div class="dropdown-menu routerLink shadow-medium">
                        <div class="row container">
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/Servises/Question">
                                <img src="../assets/img/question.png" width="40px" alt="Question"> <span class="px-3">Question</span> 
                            </router-link>
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/Servises/Users">
                                <img src="../assets/img/userList.png" width="40px" alt="Users"><span class="px-3">Users</span> 
                            </router-link>
                            <hr>
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/Servises/Tages">
                                <img src="../assets/img/tage.png" width="40px" alt="Tages"><span class="px-3">Tages</span> 
                            </router-link>
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/Servises/Badges">
                                <img src="../assets/img/badges.png" width="40px" alt="Badges"><span class="px-3">Badges</span> 
                            </router-link>
                            <hr>
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/Settings">
                                <img src="../assets/img/settings.png" width="40px" alt="Settings"><span class="px-3">Settings</span> 
                            </router-link>
                            <router-link class="nav-link p-2 col-5 serviceLink" to="/ContactUs">
                                <img src="../assets/img/contact.png" width="40px" alt="Contatc"><span class="px-3">Contat</span> 
                            </router-link>
                        </div>
                    </div>
                </li>
            </ul> 
        </nav>
        <div class="profil dropdown d-flex gap-2 align-items-center">
            <div class="info d-flex flex-column">
                <span class="fw-bold">Rabie Ait Imghi</span>
                <button  class="Professional">Professional</button>
            </div>
            <div class="image-user dropdown-toggle" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/img/user.png" width="60px" alt="">
            </div>
            <div class="dropdown-menu profile-menu shadow-medium" aria-labelledby="dropdown2">
                <div class="d-flex flex-column gap-3 jjustify-content-center">
                    <router-link class="nav-link d-flex gap-2 align-items-center px-2" to="/Profile">
                        <img src="../assets/img/user.png" width="40px" alt="Profile"> Profile
                    </router-link>
                    <hr class="m-none">
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3" to="/Settings">
                        <img src="../assets/img/settings.png" width="30px" alt="Settings"> Settings
                    </router-link>
                    <hr class="m-none nav-mobile">
                    
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/Servises/Question">
                        <img src="../assets/img/question.png" width="30px" alt="Question"> <span>Question</span> 
                    </router-link>
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/Servises/Users">
                        <img src="../assets/img/userList.png" width="30px" alt="Users"><span>Users</span> 
                    </router-link>
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/Servises/Tages">
                        <img src="../assets/img/tage.png" width="30px" alt="Tages"><span>Tages</span> 
                    </router-link>
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/Servises/Badges">
                        <img src="../assets/img/badges.png" width="30px" alt="Badges"><span>Badges</span> 
                    </router-link>
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/Settings">
                        <img src="../assets/img/settings.png" width="30px" alt="Settings"><span>Settings</span> 
                    </router-link>
                    <router-link class="nav-link d-flex gap-2 align-items-center px-3 nav-mobile" to="/ContactUs">
                        <img src="../assets/img/contact.png" width="30px" alt="Contatc"><span>Contat</span> 
                    </router-link>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppLayout',
    }
</script>
<style>
    .headerLayout{
        height: 80px;
    }
    .routerLink{
        width: 600px;
    }
</style>