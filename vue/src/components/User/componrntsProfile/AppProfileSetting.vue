<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white shadow">
            <section class="cover" :style="{ backgroundImage: `url(${user.imageCover})`, backgroundSize: 'cover' }">
                <div class="coverInfo row p-3">
                    <div class="profile col-2 d-flex flex-column justify-content-end">
                        <input type="file" @change="changeImage('Profil')" class="d-none" id="fileinputProfil">
                        <img @click="uploadsImageProfile" class="cursor-point imageProfil" :src="user.imageProfile" alt="image" height="140px" width="140px">
                    </div>
                    <div class="infoProfile col pt-4 pe-4">
                        <input type="file" class="d-none" @change="changeImage('Cover')" id="fileinputCover">
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point">Tap Upload Your <br>
                            Cover Photo</div>
                        <div class="containName infoProfileHiden  m-1 rounded-1 d-flex justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">{{user.name}}</btn>
                            <div class="buttons d-flex gap-4 ">
                                <router-link to='/user/settings'> <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button :class="user.badge" class="m-1">{{user.badge}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <div class="border-bottom container-mf pt-4 pb-4 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> {{user.firstName}} {{user.lastName}}</span></span>  
                <router-link to="/user/myQuestion" >
                    <button class="btn btn-light shadow fw-bold text-secondary">Show All Your Question</button>
                </router-link> 
            </div> 
            
            <section class="container-mf mt-4 pt-2">
                <form class="mt-4">
                    <div class="d-flex align-items-center gap-2">
                        <img src="../../../assets/img/information.png" class="imageprofilesetting2" width="50px" alt="info">
                        <div class="fw-bold text-secondary h3 pt-2">Basic Information</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Nickname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" :value="user.name" placeholder="RabieImghi">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" :value="user.firstName" placeholder="Rabe">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="user.lastName" placeholder="Ait Imghi">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Country <span class="text-warning">(optionel)</span></label>
                            <select name="country" id="" v-model="user.country" class="form-control">
                                <option v-for="country in countries" :key="country.common" :value="country.name.common">
                                    {{ country.name.common }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Phone <span class="text-warning">(optionel)</span></label>
                            <input type="text" class="form-control" v-model="user.phone" placeholder="+21260000-0000">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">E-Mail </label>
                            <input type="text" class="form-control"  readonly :value="user.email">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">About <span class="text-warning">(optionel)</span></label>
                            <textarea type="text" rows="10" class="form-control" v-model="user.about"></textarea>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 pt-4">
                        <img src="../../../assets/img/webpage.png" class="imageprofilesetting" width="40px" alt="info">
                        <div class="fw-bold text-secondary h3 pt-2">Social Profiles </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="fw-bold h6 text-primary">Facebook (url) </label>
                            <input type="text" class="form-control" v-model="user.facebook" placeholder="https://example.com">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-dark">Github (url)</label>
                            <input type="text" class="form-control" v-model="user.Github" placeholder="https://example.com">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-success">whatsapp (Num)</label>
                            <input type="text" class="form-control" v-model="user.whatsapp" placeholder="+21260000-0000">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-danger">Email (Email)</label>
                            <input type="email" class="form-control" v-model="user.emailSosial" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-primary ">LinkedIn (url)</label>
                            <input type="text" class="form-control" v-model="user.linkedin" placeholder="https://example.com">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Web Site (url)</label>
                            <input type="text" class="form-control" v-model="user.WebSite" placeholder="www.example.com">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary w-100 mt-3" @click="submitForm">Save Your Info</button>
                </form>
            </section>
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
    import Swal from 'sweetalert2';
    export default{
        name: 'AppProfileSetting',
        data() {
            const store = useStore();
            return {
                store,
                user: [],
                countries: [],
            };
        },
        computed: {
            userName(){
                return this.store.user;
            },
            userBadge(){
                return this.store.badge;
            },
            avatar(){
                return this.store.imageUser;
            },
            userId(){
                return this.store.user_id;
            },
            coverImage(){
                return this.store.coverImage;
            },
        },
        mounted(){
            this.getUserInfo();
        },
        created() {
            axios.get('https://restcountries.com/v3.1/all')
            .then(response => {
                this.countries = response.data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            })
            .catch(error => console.error('Error:', error));
        },
        methods:{
            uploadsImageCover(){
                document.getElementById('fileinput').click();
            },
            uploadsImageProfile(){
                document.getElementById('fileinputProfil').click();
            },
            async changeImage(type){
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
                const response = await axios.post(`http://localhost:8000/api/uploadImage`, formData);
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
                let response = await axios.get(`http://localhost:8000/api/getUserInfo/${this.userId}`);
                this.user = response.data.user;
                console.log(this.user)
            },
            async submitForm(){
                let response = await axios.post(`http://localhost:8000/api/updateUserInfo`, this.user);
                if(response.data.message){
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "User info updated successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            }
        }
    }
</script>
<style>
    .row{
        width: 100%;
        margin: 0 !important;
    }
    .coverInfo{
        background: rgba(0, 0, 0, 0.476);
    }
    .containName{
        background: rgba(255, 255, 255, 0.341);
    }
    .imageProfil{
        border: 6px solid white;
        border-radius: 50%;
    }
    .statique{
        width: 180px;
    }
   .linksosial{
    width: 340px;
   }
</style>