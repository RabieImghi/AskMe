<template>
    <div>
        <div class="border-bottom pb-4 pt-4" v-for="post in Posts" :key="post.id">
            <div class="container-mf mobileQuestion row">
                <div class="imageInfoUser col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
                    <img src="../../assets/img/user.png" width="80px" alt="User">
                    <div class="raitting d-flex flex-column  justify-content-center align-items-center gap-2">
                        <router-link to="">
                            <img src="../../assets/img/raitting.png" width="20px" class="rotate-180" alt="raitin">
                        </router-link>
                        <span class="text-secondary fw-bold">123</span>
                        <router-link to="">
                            <img src="../../assets/img/raitting.png" width="20px" alt="raitin">
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
                    <router-link to="/Answers" class="nav-link">
                        <span class=" h3 fw-bold">{{post.question}}</span>
                        <p class="text-secondary pt-3">{{post.questionDetail}}</p>  
                    </router-link>
                    <div class="Tages  d-flex gap-3 align-items-center flex-wrap">
                        <div  v-for="tag in post.tages" :key="tag" 
                        class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                            <img src="../../assets/img/tage.png" width="30px" alt="">
                            <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                <span  class="color-premary">{{tag}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="statistiqueQuistion shadow d-flex flex-wrap gap-3 justify-content-between align-items-center p-3 mt-3 ">
                        <div class="statiqueInfo d-flex gap-5 align-items-centerlign">
                            <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 flex-wrap align-items-center">
                                <img src="../../assets/img/answerImage.png" width="30px" alt="answerImage">
                                {{post.answor}} Answers
                            </span>
                            <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 flex-wrap align-items-center">
                                <img src="../../assets/img/view.png" width="30px" alt="answerImage">
                                {{post.views}} Views
                            </span>
                        </div>
                        <div class="addAnswere">
                            <router-link to="/Answers" class="btn btn-primary">
                                Answer
                            </router-link>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppDisplayQuestion',
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
                    },
                    {
                        id:2,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        category : 'PHP',
                        question: 'How do native speakers tell I’m foreign based on my English alone?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        tages : ["tag1", "tag2", "tag3", "tag4"],
                        answor : 10,
                        views : 20,
                    },
                    {
                        id:3,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        category : 'PHP',
                        question: 'Why are the British confused about us calling bread rolls “biscuits” when they call bread rolls “puddings”?',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        tages : ["tag1", "tag2", "tag3"],
                        answor : 10,
                        views : 20,
                    },
                    {
                        id:4,
                        name: 'Rabie Imghi',
                        badge: 'Professional',
                        date:' April 19, 2023',
                        category : 'PHP',
                        question: 'Google Analytics reads like a seismic chart lately',
                        questionDetail: 'Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that I need to check. We are not at the point of using',
                        tages : ["tag1", "tag2", "tag3"],
                        answor : 10,
                        views : 20,
                    }
                ],
            };
        },
    }
</script>