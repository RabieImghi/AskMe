<template>
    <div class=" padding-none pe-4">
        <div class="bg-white shadow main-body">
            <section class="cover" :style="{ backgroundImage: `url(${user.imageCover})`, backgroundSize: 'cover' }">
                <div class="coverInfo row p-3">
                    <div class="infoProfile col pt-4 pe-4">
                        <input type="file" class="d-none" @change="changeImage('Cover')" id="fileinputCover">
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point"
                        :class="{ 'textProfileOpacity': this.userId != this.store.user_id }">Tap Upload Your <br>
                            Cover Photo</div>
                        <div class="containName infoProfileHiden  m-1 rounded-1 d-flex flex-wrap justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">Home / profile</btn>
                            <div class="buttons d-flex gap-4 ">
                                <router-link to="/user/myQuestion"> 
                                    <button class="btn btn-dark m-1" v-if="this.userId == this.store.user_id"> My Question </button>
                                </router-link>
                                <router-link to='/user/settings' v-if="this.userId == this.store.user_id"> <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button :class="user.badge" class="m-1">{{user.badge}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <div class="row pt-4 gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card"  style="box-shadow: none;">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <input type="file" @change="changeImage('Profil')" class="d-none" id="fileinputProfil">
                                <img @click="uploadsImageProfile" :src="user.imageProfile" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{user.name}}</h4>
                                    <p class="text-secondary mb-1 fw-bold h6">{{user.followers}} Follower | {{ user.following }} Following</p>
                                    <p class="text-muted font-size-sm">{{ user.country }}</p>
                                    <button v-if="this.userId != this.store.user_id && user.isFollowed == 0" @click="follow()" class="btn btn-primary me-2">
                                        <span>Follow</span>
                                    </button>
                                    <button v-if="user.isFollowed !=0 " @click="follow()" class="btn btn-outline-primary me-2">
                                        <span>Following</span>
                                    </button>

                                    <a v-if="user.donnationLink && user.id != this.store.user_id" :href="user.donnationLink" target="_blank" class="btn btn-warning me-2">
                                        donnation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3"  style="box-shadow: none;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.WebSite' target="_blank" class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0  d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Website</h6>
                                </a>
                                <span v-if="user.WebSite" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.Github' target="_blank" class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0 d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-github mr-2 icon-inline">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Github</h6>
                                </a>
                                <span v-if="user.Github" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.twitter' target="_blank" class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0 d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                </a>
                                <span v-if="user.twitter" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.instagram' target="_blank" class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0 d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                </a>
                                <span v-if="user.instagram" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.facebook' target="_blank"  class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0 d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                </a>
                                <span v-if="user.facebook" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mt-2 mb-2">
                                <a :href='user.linkedin' target="_blank"  class="text-secondary" style="text-decoration: none">
                                <h6 class="mb-0 d-flex gap-2 align-items-center">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 22V15C18 13.8954 17.1046 13 16 13C14.8954 13 14 13.8954 14 15V22H10" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 22V15C10 11.6863 12.6863 9 16 9C19.3137 9 22 11.6863 22 15V22H18" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="3" y="9" width="4" height="13" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="5" cy="4" r="2" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                   LinkedIn</h6>
                                </a>
                                <span v-if="user.linkedin" class="text-success">Active</span>
                                <span v-else class="text-danger">Not Active</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 border-left">
                    <div class="card mb-3"  style="box-shadow: none;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ user.name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">first Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{user.firstName}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{user.lastName}}
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
                                <div class="col-sm-9 text-secondary">
                                    {{user.phone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{user.about}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="card mb-3"  style="box-shadow: none;">
                        <div class="">
                            <div class="row ">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card l-bg-cherry">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Question Posted</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{user.countQuesions}}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" 
                                                :style="{ width: porsentage(user.countQuesions)}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Total Response</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                       {{user.countReponse}}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" 
                                                :style="{ width: porsentage(user.countReponse)}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card l-bg-green-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Point</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{user.Point}}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-orange" role="progressbar" :style="{ width: porsentage(user.Point)}"
                                                data-width="100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card l-bg-orange-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Review</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{user.Review}}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0"
                                                :style="{ width: porsentage(user.Review)}" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center text-secondary border-top mt-4 fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    import { useStore } from '../../../store';
    export default{
        name: 'AppBadge',
        props:['idUser'],
        data() {
            const store = useStore();
            return {
                store,
                imageCover: store.coverImage,
                imageProfile: store.imageUser,
                user:[],
            };
        },
        computed: {
            userId(){
                if(this.idUser != null){
                    this.store.setuserProfileId(this.idUser)
                }
                return this.store.userProfileId;
            },
            avatar() {
                return this.store.imageUser;
            },
            
            coverImage() {
                return this.store.coverImage;
            },
        },
        watch: {
            '$route': 'getUserInfo'
        },
        mounted(){
            this.getUserInfo();
        },
        methods:{
            uploadsImageCover(){
                if(this.userId == this.store.user_id)
                document.getElementById('fileinputCover').click();
            },
            uploadsImageProfile(){
                if(this.userId == this.store.user_id)
                document.getElementById('fileinputProfil').click();
            },
            async changeImage(type){
                let store = new useStore();
                const file = document.getElementById(`fileinput${type}`).files[0];
                if (file.length === 0) {
                    console.log("No file selected");
                    return;
                }
                const reader = new FileReader();
                reader.readAsDataURL(file);
                const formData = new FormData();
                formData.append('image', file);
                formData.append('type', type);
                formData.append('id', this.userId);
                const response = await axios.post(`${store.URL}uploadImage`, formData,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(type ==  'Profil'){
                    reader.onload = (e) => {
                        this.store.imageUser = e.target.result;
                    };
                  this.store.setImageUser(response.data.image);   
                }else{
                    reader.onload = (e) => {
                        this.store.coverImage = e.target.result;
                    };
                    this.store.setCoverImage(response.data.image); 
                } 
            },
            async getUserInfo(){
                var followerId =null;
                if(this.store.user_id != null){
                    followerId = this.store.user_id;
                }
                let response = await axios.get(`${this.store.URL}getUserInfo/${this.userId}/${followerId}`);
                if(response.data.message == 'errore'){
                    this.$router.push('/user/');
                }
                this.user = response.data.user;
            },
            porsentage(data){
                var porsentage = (data / 100) * 100;
                return `${porsentage}%` ;
            },
            follow(){
                var formData = new FormData();
                formData.append('user_id', this.userId);
                formData.append('follower_id', this.store.user_id);
                axios.post(`${this.store.URL}follow`,formData,{
                    headers: {'Authorization': `Bearer ${this.store.token}` }
                }).then(() => {
                    this.getUserInfo();
                });
            }
        }
    }
</script>
<style type="text/css">
    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
    .main-body {
        height: calc(100vh - 80px) !important;
        overflow: scroll;
    }
    .main-body::-webkit-scrollbar {
        display: none;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>