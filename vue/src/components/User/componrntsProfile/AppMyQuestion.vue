<template>
    <div class="sectionBadge padding-none pe-4">
        <div class="bg-white shadow">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-secondary">Home /<span class="text-secondary-500"> My Question</span></span>  
                <!-- <button class="btn btn-light shadow fw-bold text-secondary">Show All Your Question</button> -->
            </div> 
            
            <section class="container-mf mt-4 pt-2">
                <div class="border-bottom pb-4 pt-4" v-for="post in Posts" :key="post.id">
                    <div class="container-mf mobileQuestion row">
                        <div class="imageInfoUser col-1 gap-3 d-flex flex-column justify-content-start align-items-center">
                            <router-link :to="{ name: 'UserProfile', params: { idUser: post.user_id } }">
                                <img :src="post.imageUser" style="border-radius: 50%;" width="80px" alt="User">
                            </router-link>
                            <div class="raitting d-flex flex-column  justify-content-center align-items-center gap-2">
                                <span v-if="userId" class="cursor-point" @click="ChangeReating('+',post.id)">
                                    <svg :class="{ 'activeVote': isInArray(this.idUser, post.listIdUserVoted) === 'Active+' }" id=plusVote xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                                    </svg>
                                </span>
                                <span class="text-secondary fw-bold" >{{post.reating}}</span>
                                <span v-if="userId"  class="cursor-point" @click="ChangeReating('-',post.id)">
                                    <svg :class="{ 'activeVote': isInArray(this.idUser, post.listIdUserVoted) === 'Active-' }" id="moinVote" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="infoQuestion col-11">
                            <div class="userInfo d-flex gap-5 pt-2 pb-3">
                                <span class="color-premary fw-bold">{{post.name}}</span>
                                <button  :class='post.badge'>{{post.badge}}</button>
                                <span class="text-secondary">Asked : <span class="text-danger">{{post.created_at}}</span></span>
                                <span class="text-secondary">In : <span class="text-danger">{{post.category}}</span></span>
                            </div>
                            <span class=" h3 fw-bold  cursor-point" @click="navigateToAnswer(post.id)">{{post.title}}</span>
                            <p class="pt-3  cursor-point" id="contentPost" @click="navigateToAnswer(post.id)" style="height: 100px; overflow: hidden; width: 100%;" v-html="post.content"></p>  
                        
                            <div class="Tages  d-flex gap-3 align-items-center flex-wrap">
                                <div  v-for="tag in post.tages" :key="tag" 
                                class="tageLineare d-flex gap-2 justify-content-between rounded-1 align-items-center  border mt-2 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25"  height="25" fill="#ffffff" class="bi bi-tags" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                                    </svg>
                                    <div class="text-white infoUser fw-bold d-flex flex-column align-items-center">
                                        <span  class="">#{{tag}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center border-top pt-3  mt-3 ">
                                <div class="statiqueInfo d-flex gap-5 align-items-centerlign">
                                    <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 flex-wrap align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="pb-1 bi bi-reply" viewBox="0 0 16 16">
                                        <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"/>
                                        </svg>
                                        {{post.answers}} Answers
                                    </span>
                                    <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 flex-wrap align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                        {{post.views}} Views
                                    </span>
                                </div>
                                <div class="addAnswere d-flex gap-3">
                                    <button @click="navigateToAnswer(post.id)" class="btn btn-primary f-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2 bi bi-patch-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
                                            <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                        </svg>
                                        Answer
                                    </button>
                                    <button  @click="navigateToUpdate(post)" class="btn btn-success f-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                        update
                                    </button>
                                    <button class="btn btn-danger f-flex align-items-center" @click="confirmDelete(post.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
                <div v-if="nbPage > 1" class="navigation d-flex justify-content-end gap-2 align-items-center pt-3 pb-3">
                    <button @click="previews()" class="btn btn-primary fw-bold">&lt;</button>
                    <button v-for="nb in nbPage" :key="nb.id" :class="{ activeClass: page === nb } " class="btn btn-light border" @click="getPage(nb)">{{nb}}</button>
                    <button @click="next()" class="btn btn-primary fw-bold">></button>
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
    import Swal from 'sweetalert2';
   import { useStore } from '@/store';
    export default{
        name: 'AppBadge',
        data(){
            return {
                Posts : [],
                nombrePost: 0,
                page:1,
                count:0,
                nbPage:1,
                userId:null,
            };
        },
        mounted() {
            const store = new useStore();
            this.userId = store.user_id;
            this.fetchPosts();
        },
        methods:{
            navigateToAnswer(postId) {
                this.$router.push({ name: 'userAnswers', params: { id: postId} });
            },
            async ChangeReating(type,id){ 
                var store = new useStore();
                var idUser = store.user_id
                let response = await axios.get(`${store.URL}ChangeReating/${id}/${idUser}/${type}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response == 200){
                    this.fetchPosts();
                }
            },
            navigateToUpdate(post) {
                this.$router.push({ name: 'UpdateMyQuestion', params: { 
                    id: post.id,
                    titlePoste: post.title,
                    content: post.content,
                    category_id: post.category_id,
                    tages_id: post.tages_id,

                } });
            },
            async fetchPosts() {
                var store = new useStore();
                let response= await axios.get(`${store.URL}MyPost/${store.user_id}?page=${this.nombrePost}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response.status == 200){
                    this.Posts = response.data.data;
                    this.count= response.data.count;
                    this.nbPage = Math.ceil(this.count / 6);
                }
            },
            next(){
                if(this.nombrePost < this.count - 6){
                    this.nombrePost += 6;
                    this.page += 1;
                    this.fetchPosts(); 
                    this.$nextTick(() => {
                        document.querySelector('.sectionHome').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            previews(){
                if(this.nombrePost >= 6){
                    this.nombrePost -= 6;
                    this.page -= 1;
                    this.fetchPosts();
                    this.$nextTick(() => {
                        document.querySelector('.sectionHome').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            getPage(page){
                this.nombrePost = page * 6 - 6;
                this.page = page;
                this.fetchPosts();
                this.$nextTick(() => {
                    document.querySelector('.sectionHome').scrollIntoView({ behavior: 'smooth' });
                });
            },
            uploadsImageCover(){
                document.getElementById('fileinput').click();
            },
            uploadsImageProfile(){
                document.getElementById('fileinputProfil').click();

            },
            confirmDelete(postId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.deletePost(postId);
                    }
                })
            },
            async deletePost(postId) {
                let store = new useStore();
                let response= await axios.delete(`${store.URL}DeletePost/${postId}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response.status == 200){
                    Swal.fire(
                        'Deleted!',
                        'Your post has been deleted.',
                        'success'
                    )
                    this.fetchPosts();
                    console.log(response);
                }else{
                    Swal.fire(
                        'Error!',
                        'Your post has not been deleted.',
                        'error'
                    )
                }
            },
            isInArray(idUser,table) {
                let idTable = table.map(item => String(item.id));
                let idUserExists = idTable.includes(String(idUser));
                if(idUserExists){
                    var voteType = table.filter(item => item.id == idUser);
                    if(voteType[0].type == '+'){
                        return 'Active+'
                    }else{
                        return 'Active-'
                    }
                }else return '';
            },
        },
    }
</script>
<style>
    #contentPost div:nth-child(2){
        width: 100% !important;
    }
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
    .cover{
        background-image: url("../../../assets/img/cover.jpg");
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
   .tageLineare{
        background: linear-gradient(-30deg,#ac6bb2,#4C66DA);
        cursor: pointer;
    }
    .tageLineare:hover {
        background: linear-gradient(-30deg,#4C66DA,#ac6bb2);
        color: #ffffff;
    }
    .btn-primary {
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out !important;
    }

    .btn-primary:hover {
        background-color: #8432f0 !important;
        border-color: #8432f0 !important;
    }
</style>