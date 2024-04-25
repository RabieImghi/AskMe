<template>
    <div class="d-flex justify-content-between align-items-center headerLayout shadow-mdf container-mf">
        <div class="logo">
            <router-link to="/">
                <img src="../../assets/img/logo3.png" class="logoImage" width="140px" alt="">
            </router-link> 
        </div>
        <nav class="navigationLayout mt-2">
            <ul class="d-flex gap-4 list-unstyled ">
                <li><router-link class="nav-link" to="/user/">Home</router-link></li>
                <li><router-link class="nav-link" to="/user/aboutUs">About Us</router-link></li>
                <li class="nav-item dropdown "  style="z-index: 1000 !important;">
                    <router-link class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false" to="/Servises">Services</router-link>
                    <div class="dropdown-menu routerLink shadow-medium " >
                        <div class="container" >
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                </svg> 
                                <span class="px-3">Question</span> 
                            </router-link>
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/user/Servises/Users">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                </svg>
                                <span class="px-3">Users</span> 
                            </router-link>
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/user/Servises/Tages">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                                </svg>
                                <span class="px-3">Tages</span> 
                            </router-link>
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/user/Servises/Badges">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                </svg>
                                <span class="px-3">Badges</span> 
                            </router-link>
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/user/settings">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z"/>
                                </svg>
                                <span class="px-3">Settings</span> 
                            </router-link>
                            <router-link class="nav-link p-2 d-flex gap-3 align-items-center" to="/user/contactUs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                </svg>
                                <span class="px-3">Contat</span> 
                            </router-link>
                        </div>
                    </div>
                </li>
            </ul> 
        </nav>
        <div class="profil dropdown d-flex gap-2 align-items-center">
            <div class="info d-flex flex-column" v-if="tokenExists">
                <span class="fw-bold">{{userName}}</span>
                <button :class="userBadge"  class="btnLevel">{{userBadge}}</button>
            </div>
            <div class="image-user dropdown-toggle" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                <img v-if="!tokenExists" src="../../assets/img/user.png" width="60px" alt="">
                <img v-if="tokenExists" :src="avatar" width="60px"  style="border-radius: 50%;" alt="">
            </div>
            <div class="dropdown-menu profile-menu shadow-medium" aria-labelledby="dropdown2">
                <div class="d-flex flex-column gap-3 jjustify-content-center">
                    <router-link v-if="tokenExists" class="nav-link d-flex gap-2 align-items-center px-2" :to="{ name: 'UserProfile', params: { idUser: userId } }">
                        <img src="../../assets/img/user.png" width="40px" alt="Profile"> Profile
                    </router-link>
                    <router-link v-if="!tokenExists" class="nav-link d-flex gap-2 align-items-center px-2" to="/user/auth/">
                        <span class="px-3">Sign In</span> 
                    </router-link>
                    <router-link v-if="!tokenExists" class="nav-link d-flex gap-2 align-items-center px-2" to="/user/auth/register">
                        <span class="px-3">Sign Up</span> 
                    </router-link>
                    <router-link v-if="userRole==1" class="nav-link p-2 d-flex gap-2 align-items-center" to="/admin/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 1 .5.5v5.5H9a.5.5 0 0 1 0 1H7a.5.5 0 0 1-.5-.5V4a.5.5 0 0 1 .5-.5h1zm-1 11a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm0 1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>
                            <path d="M2.030 6.27a7 7 0 0 1 11.94 0 .5.5 0 1 1-.886.556A6 6 0 0 0 2.917 6.82a.5.5 0 1 1 .113-.55z"/>
                        </svg>
                        <span class="px-3">Dashboard</span> 
                    </router-link>
                    <a href="/user/" v-if="tokenExists" @click="logout" class="nav-link p-2 d-flex gap-2 align-items-center cursor-point">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                        <span class="px-3">Logout</span> 
                    </a>
                    <hr class="m-none nav-mobile">
                    <router-link class="nav-mobile d-none nav-link p-2 d-flex gap-2 align-items-center" to="/user/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg> 
                        <span class="px-3">Question</span> 
                    </router-link>
                    <router-link class="nav-mobile d-none nav-link p-2 d-flex gap-2 align-items-center" to="/user/Servises/Users">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                        <span class="px-3">Users</span> 
                    </router-link>
                    <router-link class="nav-mobile d-none nav-link p-2 d-flex gap-2 align-items-center" to="/user/Servises/Tages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                        <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                        </svg>
                        <span class="px-3">Tages</span> 
                    </router-link>
                    <router-link class="nav-mobile d-none nav-link p-2 d-flex gap-2 align-items-center" to="/user/Servises/Badges">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                        <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                        </svg>
                        <span class="px-3">Badges</span> 
                    </router-link>
                    <router-link class="nav-mobile d-none nav-link p-2 d-flex gap-2 align-items-center" to="/user/contactUs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                        </svg>
                        <span class="px-3">Contat</span> 
                    </router-link>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { useStore } from '../../store';
    export default{
        name: 'AppLayout',
        data(){
            const store = useStore();
            return{
                store,
            }
        },
        computed: {
            tokenExists() {
                return this.store.token;
            },
            userId(){
                return this.store.user_id;
            },
            userRole() {
                return this.store.role_id;
            },
            userName(){
                return this.store.user;
            },
            userBadge(){
                return this.store.badge;
            },
            avatar(){
                return this.store.imageUser;
            }
        
            
        },
        methods:{
            logout() {
                localStorage.clear();
                axios.get(`${this.store.URL}logout`);
            }
            
        }
    }
</script>
<style>
    @media screen and (max-width: 450px){
        .nav-mobile.d-none{
            display: block !important;
        }   
    }
    .headerLayout{
        height: 80px;
        position: sticky !important;
        top: 0px !important;
        z-index: 100 !important;
        position: relative;
    }
</style>