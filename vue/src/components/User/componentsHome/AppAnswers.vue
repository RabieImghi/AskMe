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
                            <img src="../../../assets/img/user.png" width="80px" alt="User">
                            <div class="raitting d-flex flex-column  justify-content-center align-items-center gap-2">
                                <span class="cursor-point" @click="ChangeReating('+',post.id)">
                                    <img src="../../../assets/img/raitting.png" width="20px" class="rotate-180" alt="raitin">
                                </span>
                                <span class="text-secondary fw-bold">{{post.reating}}</span>
                                <span class="cursor-point" @click="ChangeReating('-',post.id)">
                                    <img src="../../../assets/img/raitting.png" width="20px" alt="raitin">
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
                            <img src="../../../assets/img/user.png" width="80px" alt="User">
                        </div>
                        <div class="infoQuestion col-11">
                            <div class="userInfo d-flex gap-5 pt-2 pb-3">
                                <span class="color-premary fw-bold">{{answer.name}}</span>
                                <button  :class='answer.badge'>{{answer.badge}}</button>
                                <span class="text-secondary">Added an answer on : <span class="text-danger">{{answer.date}}</span></span>
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
                                <span class="cursor-point" @click="ChangeReatingAnswer('+',answer.id)">
                                    <img src="../../../assets/img/raitting.png" width="20px" class="rotate-180" alt="raitin">
                                </span>
                                <span class="text-secondary fw-bold">{{answer.reating}}</span>
                                <span class="cursor-point" @click="ChangeReatingAnswer('-',answer.id)">
                                    <img src="../../../assets/img/raitting.png" width="20px" alt="raitin">
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
    export default{
        name: 'AppAnswers',
        props:['id'],
        data(){
            return {
                Posts : [],
                Answers : [],
                CountAnswer: 0,
                answerDetails: '',
                idUser : null
            };
        },
        mounted(){
            const store = new useStore();
            this.idUser = store.user_id;
            if(this.id != undefined)
                store.setPost_id(this.id);
            this.fetchPosts();
          
        },
        methods:{
            ChangeReating(type,id){ 
                var store = new useStore();
                var idUser = store.user_id
                axios.get(`http://127.0.0.1:8000/api/ChangeReating/${store.post_id}/${idUser}/${type}`)
                .then(() => {
                    this.fetchPosts();
                });
            },
            ChangeReatingAnswer(type,id){ 
                axios.get(`http://127.0.0.1:8000/api/ChangeReatingAnswer/${id}/${this.idUser}/${type}`)
                .then(() => {
                    this.fetchPosts();
                });
            },
            fetchPosts(){
                var store = new useStore();
                axios.get(`http://127.0.0.1:8000/api/getPostAnswers/${store.post_id}`)
                .then(response => {
                    this.Posts = response.data.post;
                    this.Answers = response.data.Answers;
                    this.CountAnswer = response.data.countAnswer;
                })
            },
            submitForm(){
                var store = new useStore();
                let formData = new FormData();
                formData.append('answerDetails', this.answerDetails);
                formData.append('post_id', store.post_id);
                formData.append('user_id', store.user_id);
                axios.post('http://localhost:8000/api/addAnswer', formData)
                .then(() => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your Answer has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.fetchPosts();
                    this.answerDetails = '';
                })
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
                        axios.get(`http://localhost:8000/api/deleteAnswer/${id}`)
                        .then(() =>{
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Your Answer has been Deleted",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            this.fetchPosts();
                        })
                    }
                });
            },
            submitFormUpdate(){
                let formData = new FormData();
                formData.append('answerDetails', document.getElementById('answerDetail').value);
                formData.append('answerId', document.getElementById('idAnswer').value);
                axios.post('http://localhost:8000/api/updateAnswer', formData)
                .then(() => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your Answer has been update",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    this.fetchPosts();
                })
            },
            updateAnswer(id,content){
                document.getElementById('answerDetail').value = content;
                document.getElementById('idAnswer').value = id;
            }

        }
    }
</script>
<style>
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