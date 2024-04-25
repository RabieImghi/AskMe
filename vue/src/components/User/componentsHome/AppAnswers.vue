<template>
    <div class="sectionHome pe-4">
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom d-flex justify-content-between  container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
                <span class="fw-bold text-primary">{{ this.CountAnswer }} Question</span>
            </div> 
            <section class="border-bottom">
                <div class=" pb-4 pt-4" v-for="post in Posts" :key="post.id">
                    <div class="container-mf mobileQuestion row">
                        <div class="imageInfoUser col-1 gap-3 d-flex flex-column align-items-center">
                            <router-link :to="{ name: 'UserProfile', params: { idUser: post.user_id } }">
                                <img :src="post.imageUser" style="border-radius: 50%;" width="80px" alt="User">
                            </router-link>
                            <div class="raitting d-flex flex-column  justify-content-center align-items-center gap-2">
                                <span v-if="idUser" class="cursor-point" @click="ChangeReating('+',post.id)">
                                    <svg :class="{ 'activeVote': isInArray(this.idUser, post.listIdUserVoted) === 'Active+' }" id=plusVote xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                                    </svg>
                                </span>
                                <span class="text-secondary fw-bold" >{{post.reating}}</span>
                                <span v-if="idUser"  class="cursor-point" @click="ChangeReating('-',post.id)">
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
                                <span class="text-secondary">Asked : <span class="text-danger">{{post.date}}</span></span>
                                <span class="text-secondary">In : <span class="text-danger">{{post.category}}</span></span>
                            </div>
                            <span class=" h3 fw-bold">{{post.question}}</span>
                            <p class="text-secondary pt-3" v-html="post.questionDetail" ></p>
                                <img :src="post.image" style="max-width: 800px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="container-mf butoonaddanswer d-flex justify-content-end mt-3 pb-3">
                    <button v-if="this.idUser != null" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewAnswer">
                        Add Answer
                    </button>
                </div>
            </section>
            <section class="border-bottom">
                <div class=" pb-4 pt-4" v-for="answer in Answers" :key="answer.id">
                    <div class="container-mf mobileQuestion row">
                        <div class="imageInfoUser col-1 gap-3 d-flex flex-column align-items-center">
                            <div :class="{ 'verfyCover': answer.isVerfy == 'verfy' }">
                                <router-link :to="{ name: 'UserProfile', params: { idUser: answer.user_id } }">
                                    <img :src="answer.imageUser" style="border-radius: 50%;" width="80px" alt="User">
                                </router-link>
                            </div>
                        </div>
                        <div class="infoQuestion col-11">
                            <div class="userInfo d-flex gap-5 pt-2 pb-3">
                                <span class="color-premary fw-bold">{{answer.name}}</span>
                                <button  :class='answer.badge'>{{answer.badge}}</button>
                                <span class="text-secondary">Added an answer on : <span class="text-danger">{{answer.date}}</span></span>
                                
                                <span class="fw-bold text-success" v-if="answer.isVerfy == 'verfy'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check2-square" viewBox="0 0 16 16">
                                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                                    </svg>
                                    Verifyed</span>
                                <div v-if="Posts[0].user_id == this.idUser && answer.isVerfy == 'notVerfy'">
                                    <span class="btn btn-success fw-bold" @click="verfyAnswer(answer.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-check2-square" viewBox="0 0 16 16">
                                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="dropdown"  v-if="answer.user_id == this.idUser">
                                    <span class="text-secondary fw-bold dropdown-toggle" style="font-size: 24px;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ...
                                    </span>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" @click="deleteAnswer(answer.id)">Delete</a></li>
                                        <li><a class="dropdown-item" @click="updateAnswer(answer.id,answer.questionDetail)" data-bs-toggle="modal" data-bs-target="#updateAnswer" href="#">Update</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-secondary pt-3">{{answer.questionDetail}}</p>
                            <div class="raitting d-flex  justify-content-start align-items-center gap-2">
                                <span v-if="idUser" class="cursor-point" @click="ChangeReatingAnswer('+',answer.id)">
                                    <svg :class="{ 'activeVote': isInArray(this.idUser, answer.listIdUserVoted) === 'Active+' }" id=plusVote xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                                    </svg>
                                </span>
                                <span class="text-secondary fw-bold">{{answer.reating}}</span>
                                <span v-if="idUser" class="cursor-point" @click="ChangeReatingAnswer('-',answer.id)">
                                    <svg :class="{ 'activeVote': isInArray(this.idUser, answer.listIdUserVoted) === 'Active-' }" id="moinVote" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
        <div class="modal fade" id="addNewAnswer" tabindex="-1" aria-labelledby="addNewAnswerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="">
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="fw-bold h6 text-secondary">Your Answer</label>
                                    <textarea v-model="answerDetails"  class="form-control" rows="10" placeholder="Type Your Message..."></textarea>
                                </div>
                            </div>
                            <div class="buttond d-flex justify-content-end gap-4 mt-3 pb-3">
                                <button type="button"  data-bs-dismiss="modal" class="btn btn-warning">Close</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button"  data-bs-dismiss="modal" class="btn btn-success" @click="submitForm">Add Answer</button>  
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateAnswer" tabindex="-1" aria-labelledby="updateAnswerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="">
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="fw-bold h6 text-secondary">Your Answer</label>
                                    <textarea id="answerDetail"  class="form-control" rows="10" placeholder="Type Your Message..."></textarea>
                                    <input type="hidden" name="idAnswer" id="idAnswer">
                                </div>
                            </div>
                            <div class="buttond d-flex justify-content-end gap-4 mt-3 pb-3">
                                <button type="button"  data-bs-dismiss="modal" class="btn btn-warning">Close</button>
                                <button type="button"  data-bs-dismiss="modal" class="btn btn-success" @click="submitFormUpdate">Update Answer</button>  
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import {useStore} from '../../../store';
    import Swal from 'sweetalert2';
import router from '@/routes/routes';
    export default{
        name: 'AppAnswers',
        props:['id'],
        data(){
            return {
                Posts : [],
                Answers : [],
                CountAnswer: 0,
                answerDetails: '',
                idUser : null,
            };
        },
        mounted(){
            const store = new useStore();
            this.idUser = store.user_id;
            if(this.id != undefined){
                store.setPost_id(this.id);
                axios.get(`${store.URL}addViewsPost/${this.id}`);
            }
            this.fetchPosts();
        },
        methods:{
            async ChangeReating(type,id){ 
                if(this.idUser== null){
                    router.push("/user/auth/")
                } else{
                    var store = new useStore();
                    var idUser = store.user_id
                    let response = await axios.get(`${store.URL}ChangeReating/${id}/${idUser}/${type}`,{
                        headers: {'Authorization': `Bearer ${store.token}` }
                    })
                    if(response.status == 200){
                        this.fetchPosts();
                    }
                }
            },
            async ChangeReatingAnswer(type,id){ 
                if(this.idUser== null){
                    router.push("/user/auth/")
                } else{
                    const store = new useStore();
                    let response= await axios.get(`${store.URL}ChangeReatingAnswer/${id}/${this.idUser}/${type}`,{
                        headers: {'Authorization': `Bearer ${store.token}` }
                    });
                    if(response.status == 200){
                        this.fetchPosts();
                    }
                }
            },
            fetchPosts() {
                var store = new useStore();
                axios.get(`${store.URL}getPostAnswers/${store.post_id}`)
                .then(response => {
                    if(response.status == 200){
                        this.Posts = response.data.post;
                        this.Answers = response.data.Answers;
                        this.CountAnswer = response.data.countAnswer;
                    }
                });
            },
            async submitForm(){
                var store = new useStore();
                let formData = new FormData();
                formData.append('answerDetails', this.answerDetails);
                formData.append('post_id', store.post_id);
                formData.append('user_id', store.user_id);
                let response = await axios.post(`${store.URL}addAnswer`, formData ,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response.status == 200){
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your Answer has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.fetchPosts();
                    this.answerDetails = '';
                }
            },
            confirmDeleteAnswer(id){
                const store = new useStore();
                axios.get(`${store.URL}deleteAnswer/${id}`,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                }).then(()=>{
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your Answer has been Deleted",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.fetchPosts(); 
                });
               
            },
            deleteAnswer(id){
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
                        this.confirmDeleteAnswer(id);
                    }
                });
            },
            submitFormUpdate(){
                const store = new useStore();
                let formData = new FormData();
                formData.append('answerDetails', document.getElementById('answerDetail').value);
                formData.append('answerId', document.getElementById('idAnswer').value);
                axios.post(`${store.URL}updateAnswer`, formData,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                }).then(response => {
                    if(response.status == 200){
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your Answer has been update",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.fetchPosts();
                    }
                });
            },
            updateAnswer(id,content){
                document.getElementById('answerDetail').value = content;
                document.getElementById('idAnswer').value = id;
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
            async verfyAnswer(answerId){
                const store = new useStore();
                var formData = new FormData();
                formData.append('answerId', answerId);
                let response =  await axios.post(`${store.URL}verfyAnswer`, formData,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response.status == 200)  {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Answer has been verfy",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.fetchPosts();
                }
            }

        }
    }
</script>
<style>
    .verfyCover{
        padding: 2px;
        border: 4px solid green;
        border-radius: 50%;
    }
    .activeVote{
        padding: 1px !important;
        border-radius: 50%;
        background: blue !important;
        color: white !important;
    }
    .checkAuth{
        box-shadow: 0px -6px 10px lightgray;
    }
    .QuestionSection{
        background: white;
    }
    .statistiqueQuistion{
        background: #FDFEF9;
    }
    #addNewAnswer{
        z-index: 100000000000 !important;
    }
    #updateAnswer{
        z-index: 100000000000 !important;
    }
    .butoonaddanswer{   
        position: sticky !important;
        top: 100px !important;
        z-index: 100000000000 !important;
    }
    .dropdown-toggle::after{
        display: none !important;
    }
</style>