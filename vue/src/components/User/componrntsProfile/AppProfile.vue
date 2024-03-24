<template>
    <div class=" pe-4">
        <div class=" bg-white shadow">
            <div class="sectionProfile">
            <section class="cover" :style="{ backgroundImage: `url(${user.imageCover})`, backgroundSize: 'cover' }">
                <div class="coverInfo row p-3">
                    <div class="profile col-2 d-flex flex-column justify-content-end">
                        <input type="file" @change="changeImage('Profil')" class="d-none" id="fileinputProfil">
                        <img @click="uploadsImageProfile" class="cursor-point imageProfil" :src="user.imageProfile" alt="image" style="max-width: 140px; min-width: 70px;">
                    </div>
                    <div class="infoProfile col pt-4 pe-4">
                        <input type="file" class="d-none" @change="changeImage('Cover')" id="fileinputCover">
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point"
                        :class="{ 'textProfileOpacity': this.userId != this.store.user_id }">Tap Upload Your <br>
                            Cover Photo</div>
                        <div class="containName infoProfileHiden  m-1 rounded-1 d-flex justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">{{user.name}}</btn>
                            <div class="buttons d-flex gap-4 ">
                                <router-link to='/user/settings' v-if="this.userId == this.store.user_id"> <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button :class="user.badge" class="m-1">{{user.badge}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <div class="border-bottom container-mf pt-4 pb-4 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> {{user.firstName}} {{user.lastName}}</span></span> 
                <router-link to="/user/myQuestion" v-if="this.userId == this.store.user_id" >
                    <button class="btn btn-light shadow fw-bold text-secondary">Show All Your Question</button>
                </router-link> 
            </div> 
            
            <section class="container-mf mt-4 pt-2">
                <div class="fw-bold text-secondary h3">Statistique</div>
                <hr>
                <div class="statistique mt-4 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/questionred.png"  height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-danger">{{user.countQuesions}}</span>
                            <span class="fw-bold h6 text-secondary">Quesions</span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/responsegreen.png"  height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-success">{{user.countReponse}}</span>
                            <span class="fw-bold h6 text-secondary">Reponse </span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/badgeOrange.png"  height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-warning">{{user.Point}}</span>
                            <span class="fw-bold h6 text-secondary">Point</span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/reviews.png" height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-primary">{{user.Review}}</span>
                            <span class="fw-bold h6 text-secondary">Reviews</span>
                        </div>
                    </div>
                </div>
                <div class="fw-bold text-secondary h3 mt-4">About</div>
                <hr>
                <div>
                    <p class="text-secondary h5 pt-3">
                        {{user.about}} 
                    </p>
                </div>
                <div class="fw-bold text-secondary h3 mt-4">Contact </div>
                <hr>
                <div class="sociallink d-flex flex-wrap gap-4 justify-content-between align-items-center">
                    <a v-if="user.facebook != null" :href="user.facebook" class="linksosial  rounded-1 border translateEffect p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/facebook.png" width="50px" alt="facebook">
                            <span class="fw-bold text-primary h4">www.facebook.com</span> 
                        </div>
                    </a>
                    <a v-if="user.Github != null" :href="user.Github"  class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/github.png" width="50px" alt="facebook">
                            <span class="fw-bold text-dark h4">www.gitHub.com</span> 
                        </div>
                    </a>
                    <a v-if="user.whatsapp != null" :href="`https://wa.me/${user.whatsapp}?text=Hello`"  class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/whatsapp.png" width="50px" alt="facebook">
                            <span class="fw-bold text-success h4">{{user.whatsapp}}</span> 
                        </div>
                    </a>
                    <a v-if="user.emailSosial != null" :href="`mailto:${user.emailSosial}?subject=Hello&body=This is a test email.`"  class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/gmail.png" width="50px" alt="facebook">
                            <span class="fw-bold text-danger h4">E-Mail</span> 
                        </div>
                    </a>
                    <a v-if="user.linkedin != null" :href="user.linkedin"  class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/linkedin.png" width="50px" alt="facebook">
                            <span class="fw-bold text-primary h4">www.likedIn.com</span> 
                        </div>
                    </a>
                    <a v-if="user.WebSite != null" :href="user.WebSite"  class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/website.png" width="50px" alt="facebook">
                            <span class="fw-bold text-dark h4">www.web.com</span> 
                        </div>
                    </a>
                </div>
            </section>
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
                if(response.data.message == 'errore'){
                    this.$router.push('/user/');
                }
                this.user = response.data.user;
            },
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
    .textProfileOpacity{
        opacity: 0 !important;
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
   .sectionProfile{
        min-height: calc(100vh - 170px) !important;
   }
</style>