<template>
    <div class="contentPage padding-none pe-4">
        <div class="bg-white sectionUser shadow">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>
                <div class="search">
                    <input v-model="searchQuery" @keyup="filteredUsers()" style="width:400px" type="search" name="search" id="saerchUesr"
                        class="form-control" placeholder="Search Users">
                </div>
            </div>
           <section v-if="isLoading" style="height: 68vh;" class="d-flex align-items-center justify-content-center"> 
                <Loader/>
            </section>
           
            <section class="userList container-mf border-bottom pb-4 pt-4 ">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
                    <div v-for="user in users" :key="user.id" class="col mb-3 " >
                        <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        @click="aficheDetailModel(user.name,user.firstName,user.lastName,user.about,
                        user.country,user.phone,user.followers,user.following,user.avatar, user.id)" > 
                            <img :src="user.coverImage" alt="Cover" class="card-img-top" style="height: 120px;">
                            <div class="card-body text-center"> 
                                <img :src="user.avatar" style="width:100px; margin-top:-65px; height: 100px;" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
                                <h5 class="card-title">{{user.name}}</h5>
                                
                                <p class="text-secondary mb-1" v-if="user.country">Country : {{user.country}}</p>
                                <p class="text-secondary mb-1" v-else>Country : Null</p>
                                <p class="text-muted font-size-sm">{{user.followers}} Follower | {{ user.following }} following</p>
                            </div>
                            <div class="border rounded-1 d-flex justify-content-between"> 
                                <button  :class="user.Level">{{user.Level}}</button>
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
                <div v-if="nbPage > 1" class="navigation d-flex justify-content-end gap-2 align-items-center pt-3 pb-3">
                    <button @click="previewsPage()" class="btn btn-primary fw-bold">&lt;</button>
                    <button v-for="nb in nbPage" :key="nb.id" :class="{ activeClass: page === nb } " class="btn btn-light border" @click="getPage(nb)">{{nb}}</button>
                    <button @click="nextPage()" class="btn btn-primary fw-bold">></button>
                </div>
            </section>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="width: 80%;">
                        <div class="row pt-4 gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card"  style="box-shadow: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img  :src="this.imageProfile" alt="Admin"
                                                class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4>{{this.name}}</h4>
                                                <p class="text-secondary mb-1 fw-bold h6">{{this.followers}} Follower | {{ this.following }} Following</p>
                                                <p class="text-muted font-size-sm" v-if="this.country">Country : {{ this.country }}</p>
                                                <p class="text-muted font-size-sm" v-else>Country : Null</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 border-left">
                                <div class="card mb-3" style="box-shadow: none;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ this.name }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">first Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{this.firstName}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Last Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{this.lastName}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="03656a73436976686e766b2d626f">[email&#160;protected]</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary" v-if="this.phone"> {{this.phone}} </div>
                                            <div class="col-sm-9 text-secondary" v-else>
                                                Null
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">About</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary" v-if="this.phone"> {{this.about}} </div>
                                            <div class="col-sm-9 text-secondary" v-else> Null</div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <router-link :to="{ name: 'UserProfile', params: { idUser: this.Detailid } }" class="nav-link">
                                                <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-light" >Details</button>
                                            </router-link>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    import Loader from "../AppLoader"
    export default{
        name: 'AppBadge',
        data(){
            const store = new useStore();
            return{
                users : [],
                searchQuery: '',
                skip: store.skip,
                count:0,
                page:1,
                nbPage:1,
                isLoading: true,
                name: null,
                firstName:null,
                lastName:null,
                about:null,
                imageProfile:null,
                country:null,
                following:null,
                followers:null,
                phone:null,
                Detailid:null,

            };
        },
        mounted(){
            this.fetchUsers();
        },
        components:{
            Loader, 
        },
        methods: {
            fetchUsers(){
                const store = useStore();
                axios.get(`${store.URL}getusers/${this.skip}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                }).then(response => {
                    this.isLoading = false;
                    this.users = response.data.users;
                    this.count = response.data.userCount;
                    this.nbPage = Math.ceil(this.count / 12);
                });
            },
            nextPage(){
                if(this.skip < this.count - 12){
                    this.skip += 12;
                    this.page += 1;
                    this.fetchUsers(); 
                    this.$nextTick(() => {
                        document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            previewsPage(){
                if(this.skip >= 12){
                    this.skip -= 12;
                    this.page -= 1;
                    this.fetchUsers();
                    this.$nextTick(() => {
                        document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            getPage(page){
                this.skip = page * 12 - 12;
                this.page = page;
                this.fetchUsers();
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            },
            filteredUsers() {
                const store = useStore();
                if(this.searchQuery === ''){
                    this.fetchUsers();
                    return;
                }
                axios.get(`${store.URL}searchusers/${this.searchQuery}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                }).then(response => {
                    this.isLoading = false;
                    this.users = response.data.users;
                    this.count = response.data.userCount;
                    this.nbPage = Math.ceil(this.count / 12);
                });
            },
            aficheDetailModel(name,firstName,lastName,about,country,phone,followers,following,avatar,id){
                this.name = name;
                this.firstName = firstName;
                this.lastName = lastName;
                this.about = about;
                this.imageProfile = avatar;
                this.country = country;
                this.following = followers;
                this.followers = following;
                this.phone = phone;
                this.Detailid = id;
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
</style>