<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white shadow">
            <section class="cover" :style="{ backgroundImage: `url(${coverImage})`, backgroundSize: 'cover' }">
                <div class="coverInfo row p-3">
                    <div class="profile col-2 d-flex flex-column justify-content-end">
                        <input type="file" @change="changeImage('Profil')" class="d-none" id="fileinputProfil">
                        <img @click="uploadsImageProfile" class="cursor-point imageProfil" :src="avatar" alt="image" height="140px" width="140px">
                    </div>
                    <div class="infoProfile col pt-4 pe-4">
                        <input type="file" class="d-none" @change="changeImage('Cover')" id="fileinputCover">
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point">Tap Upload Your <br>
                            Cover Photo</div>
                        <div class="containName infoProfileHiden  m-1 rounded-1 d-flex justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">{{userName}}</btn>
                            <div class="buttons d-flex gap-4 ">
                                <router-link to='/Settings'> <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button :class="userBadge" class="m-1">{{userBadge}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <div class="border-bottom container-mf pt-4 pb-4 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500">{{userName}}</span></span> 
                <router-link to="/user/myQuestion" >
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
                            <span class="fw-bold h5 text-danger">1000</span>
                            <span class="fw-bold h6 text-secondary">Quesions</span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/responsegreen.png"  height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-success">3332</span>
                            <span class="fw-bold h6 text-secondary">Reponse </span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/badgeOrange.png"  height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-warning">300</span>
                            <span class="fw-bold h6 text-secondary">Point</span>
                        </div>
                    </div>
                    <div class="statique translateEffect cursor-point d-flex gap-4 p-2 boeder rounded-1 bg-white shadow">
                        <img src="../../../assets/img/reviews.png" height="50px" width="50px" alt="">
                        <div class="info d-flex flex-column justify-content-around">
                            <span class="fw-bold h5 text-primary">2190</span>
                            <span class="fw-bold h6 text-secondary">Reviews</span>
                        </div>
                    </div>
                </div>
                <div class="fw-bold text-secondary h3 mt-4">About</div>
                <hr>
                <div>
                    <p class="text-secondary h5 pt-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident numquam, eos, fugiat earum cupiditate accusamus sunt illo quo ratione minima quae incidunt omnis amet accusantium repellendus blanditiis repudiandae porro optio!
                    </p>
                </div>
                <div class="fw-bold text-secondary h3 mt-4">Contact </div>
                <hr>
                <div class="sociallink d-flex flex-wrap gap-4 justify-content-between align-items-center">
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/facebook.png" width="50px" alt="facebook">
                            <span class="fw-bold text-primary h4">Rabie Ait Imghi</span> 
                        </div>
                    </a>
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/github.png" width="50px" alt="facebook">
                            <span class="fw-bold text-dark h4">RabieImghi</span> 
                        </div>
                    </a>
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/whatsapp.png" width="50px" alt="facebook">
                            <span class="fw-bold text-success h4">+21263948-3932</span> 
                        </div>
                    </a>
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/gmail.png" width="50px" alt="facebook">
                            <span class="fw-bold text-danger h4">rabieImghi@gmail.com</span> 
                        </div>
                    </a>
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/linkedin.png" width="50px" alt="facebook">
                            <span class="fw-bold text-primary h4">RabieAitImghi</span> 
                        </div>
                    </a>
                    <a href="https://www.google.com" class="linksosial  rounded-1 border translateEffect  p-2  text-decoration-none" target="_blank">
                        <div class="social cursor-point d-flex align-items-end gap-2">
                            <img src="../../../assets/img/website.png" width="50px" alt="facebook">
                            <span class="fw-bold text-dark h4">RabieImghi.com</span> 
                        </div>
                    </a>
                </div>
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
    export default{
        name: 'AppBadge',
        data() {
            const store = useStore();
            return {
                store,
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
            }
        
            
        },
        methods:{
            uploadsImageCover(){
                document.getElementById('fileinputCover').click();
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
    /* .cover{ */
        /* background-image: url("../../../assets/img/cover.jpg"); */
    /* } */
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