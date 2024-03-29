<template>
    <div class="contentPage padding-none pe-4">
        <div class="bg-white sectionUser shadow">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>
                <div class="search">
                    <input v-model="searchQuery" style="width:400px" type="search" name="search" id="saerchUesr"
                        class="form-control" placeholder="Search Users">
                </div>
            </div>
           <section v-if="isLoading" style="height: 68vh;" class="d-flex align-items-center justify-content-center"> 
                <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
           </section>
            <section class="userList container-mf border-bottom pb-4 pt-4 ">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
                    <div v-for="user in filteredUsers" :key="user.id" class="col mb-3">
                        <div class="card"> 
                            <img :src="user.coverImage" alt="Cover" class="card-img-top">
                            <div class="card-body text-center"> 
                                <img :src="user.avatar" style="width:100px;margin-top:-65px" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
                                <h5 class="card-title">{{user.name}}</h5>
                                <button  :class="user.Level">{{user.Level}}</button>
                                <p class="text-secondary mb-1" v-if="user.country">{{user.country}}</p>
                                <p class="text-secondary mb-1" v-else>Null</p>
                                <p class="text-muted font-size-sm">{{user.followers}} Follower | {{ user.following }} following</p>
                            </div>
                            <div class="border rounded-1 d-flex justify-content-between"> 
                                <router-link :to="{ name: 'UserProfile', params: { idUser: user.id } }" class="nav-link">
                                    <button class="btn btn-light btn-sm bg-white has-icon btn-block" type="button">
                                        <i class="material-icons">Details</i>
                                    </button> 
                                </router-link>
                                <button class="btn btn-light btn-sm bg-white has-icon ml-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="text-center text-secondary fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import {useStore} from '@/store';
    export default{
        name: 'AppBadge',
        data(){
            return{
                users : [],
                searchQuery: '',
                isLoading: false 
            };
        },
        created(){
            this.fetchUsers();
        },
        computed: {
            filteredUsers() {
                return this.users.filter(user => {
                    return user.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                });
            }
        },
        methods: {
            fetchUsers(){
                this.isLoading = true;
                const store = useStore();
                axios.get('http://localhost:8000/api/getusers',{
                    headers: {'Authorization': `Bearer ${store.token}` }
                }).then(response => {
                    this.isLoading = false;
                    this.users = response.data.users;
                }).catch(error => {
                    this.isLoading = false;
                    console.log(error);
                });
            }
        }
        
    }
</script>
<style>
    .sectionUser{
        min-height: calc( 100vh - 80px );
    }
    .user{
        min-width: 360px;
        max-width: 360px;
    }
    .w-60 {
        width: 80px;
    }
    h1,h2,h3,h4,h5,h6 {
        margin: 0 0 10px;
        font-weight: 600;
    }
    a{
        color: #707070;
    }
    .lds-grid {
    display: inline-block;
    position: relative;
    width: 150px;
    height: 150px;
    }
    .lds-grid div {
    position: absolute;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #000000;
    animation: lds-grid 1.2s linear infinite;
    }
    .lds-grid div:nth-child(1) {
    top: 8px;
    left: 8px;
    animation-delay: 0s;
    }
    .lds-grid div:nth-child(2) {
    top: 8px;
    left: 32px;
    animation-delay: -0.4s;
    }
    .lds-grid div:nth-child(3) {
    top: 8px;
    left: 56px;
    animation-delay: -0.8s;
    }
    .lds-grid div:nth-child(4) {
    top: 32px;
    left: 8px;
    animation-delay: -0.4s;
    }
    .lds-grid div:nth-child(5) {
    top: 32px;
    left: 32px;
    animation-delay: -0.8s;
    }
    .lds-grid div:nth-child(6) {
    top: 32px;
    left: 56px;
    animation-delay: -1.2s;
    }
    .lds-grid div:nth-child(7) {
    top: 56px;
    left: 8px;
    animation-delay: -0.8s;
    }
    .lds-grid div:nth-child(8) {
    top: 56px;
    left: 32px;
    animation-delay: -1.2s;
    }
    .lds-grid div:nth-child(9) {
    top: 56px;
    left: 56px;
    animation-delay: -1.6s;
    }
    @keyframes lds-grid {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    }

    
</style>