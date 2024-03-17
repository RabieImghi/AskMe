<template>
    <div class="sectionHome pe-4">
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom d-flex justify-content-between  container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
                <span class="fw-bold text-primary">188 Question</span>
            </div> 
            <section class="border-bottom">
                <div class=" pb-4 pt-4" v-for="post in Posts" :key="post.id">
                    <div class="container-mf mobileQuestion row">
                        <div class="imageInfoUser col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
                            <img src="../../../assets/img/user.png" width="80px" alt="User">
                            <div class="raitting d-flex flex-column  justify-content-center align-items-center gap-2">
                                <router-link to="">
                                    <img src="../../../assets/img/raitting.png" width="20px" class="rotate-180" alt="raitin">
                                </router-link>
                                <span class="text-secondary fw-bold">123</span>
                                <router-link to="">
                                    <img src="../../../assets/img/raitting.png" width="20px" alt="raitin">
                                </router-link>
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
                            <p class="text-secondary pt-3">{{post.questionDetail}}</p>
                            <img src="../../../assets/img/answer.png" width="80%" alt="Answer">
                        </div>
                    </div>
                </div>
                <div class="container-mf butoonaddanswer d-flex justify-content-end mt-3 pb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewAnswer">
                        Add Answer
                    </button>
                </div>
            </section>
            <section class="border-bottom">
                <div class=" pb-4 pt-4" v-for="answer in Answers" :key="answer.id">
                    <div class="container-mf mobileQuestion row">
                        <div class="imageInfoUser col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
                            <img src="../../../assets/img/user.png" width="80px" alt="User">
                        </div>
                        <div class="infoQuestion col-11">
                            <div class="userInfo d-flex gap-5 pt-2 pb-3">
                                <span class="color-premary fw-bold">{{answer.name}}</span>
                                <button  :class='answer.badge'>{{answer.badge}}</button>
                                <span class="text-secondary">Added an answer on : <span class="text-danger">{{answer.date}}</span></span>
                            </div>
                            <span class=" h3 fw-bold">{{answer.question}}</span>
                            <p class="text-secondary pt-3">{{answer.questionDetail}}</p>
                            <div class="raitting d-flex  justify-content-start align-items-center gap-2">
                                <router-link to="">
                                    <img src="../../../assets/img/raitting.png" width="20px" class="rotate-180" alt="raitin">
                                </router-link>
                                <span class="text-secondary fw-bold">{{answer.Reviews}}</span>
                                <router-link to="">
                                    <img src="../../../assets/img/raitting.png" width="20px" alt="raitin">
                                </router-link>
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
                                    <textarea  class="form-control" rows="10" placeholder="Type Your Message..."></textarea>
                                </div>
                            </div>
                            <div class="buttond d-flex justify-content-end gap-4 mt-3 pb-3">
                                <button type="button"  data-bs-dismiss="modal" class="btn btn-warning">Close</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-success">Add Answer</button>  
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppAnswers',
        props:['id'],
        data(){
            return {
                Posts : [
                    {
                        id:1,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        category : 'PHP',
                        question: 'Is this statement, “i see him last night” can be understood as “I saw him last night”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        tages : ["tag1", "tag2", "tag3"],
                        answor : 10,
                        views : 20,
                    }
                ],
                Answers : [
                    {
                        id:1,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        question: 'Is this statement, “i see him last night” can be understood as “I saw him last night”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        Reviews : 300,
                    },
                    {
                        id:2,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        question: 'Is this statement, “i see him last night” can be understood as “I saw him last night”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        Reviews : 300,
                    },
                    {
                        id:3,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        question: 'Is this statement, “i see him last night” can be understood as “I saw him last night”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        Reviews : 300,
                    },
                    {
                        id:4,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        question: 'Is this statement, “i see him last night” can be understood as “I saw him last night”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        Reviews : 300,
                    }
                ],
            };
        },
        created(){
            
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
    .butoonaddanswer{   
        position: sticky !important;
        top: 100px !important;
        z-index: 100000000000 !important;
    }
</style>