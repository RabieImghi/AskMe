<template>
    <div class="sectionHome pe-4">
        <section class="container-mf p-4 checkAuth d-flex justify-content-between align-items-center" style="background: #121419;">
            <div class="infoText d-flex flex-column gap-3">
                <span class="h1 fw-bold" style="color: #AEAEAE;">Share & grow the world's knowledge!</span>
                <p class="text-secondary">We want to connect the people who have knowledge to the people who need it, to bring 
                together people with different perspectives so they can understand each other better,
                and to empower everyone to share their knowledge.</p>
                <router-link to='/SignUp' class="btn btn-primary w-50">Create A New Account</router-link>
            </div>
            <img src="../../assets/img/auth.png" id="imageAuth" width="40%" class="p-3" alt="Image">
        </section>
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom pb-4">
                <div class="filtrBar container-mf d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="filter d-flex justify-content-between align-items-center gap-2">
                        <select name="" id="" class="form-select shadow-sm">
                            <option value="null" selected disabled>Filtr_By</option>
                            <option value="1">Must read Question</option>
                            <option value="1">Must read Question 1</option>
                            <option value="1">Must read Question 11</option>
                        </select>
                    </div>
                    <div class="search d-flex justify-content-betweent align-items-center gap-2">
                        <select name="" id="" style="width: 150px;" class=" form-select shadow-sm">
                            <option value="1" selected disabled>Type_Search</option>
                            <option value="question">Title</option>
                            <option value="tages">Tages</option>
                        </select>
                        <input v-model="searchQuery" type="search" style="max-width: 250px;" class="shadow-sm form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
            <div class="border-bottom pb-4 pt-4" v-for="post in filteredUsers" :key="post.id">
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
                        <span class=" h3 fw-bold">{{post.question}}</span>
                        <p class="text-secondary pt-3">{{post.questionDetail}}</p>
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
            <div class="border-bottom pb-4  pagination container-mf d-flex pt-4 justify-content-end">
                <ul class="nav">
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">&lt;</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">1</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold border mx-2 btn-primary btn">2</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">3</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">&gt;</li>
                </ul>
            </div>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
    </div>
</template>
<script>
    export default{
        name: 'AppHome',
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
                searchQuery: '',
            };
        },
        computed: {
            filteredUsers() {
                return this.Posts.filter(Post => {
                    return Post.question.toLowerCase().includes(this.searchQuery.toLowerCase());
                });
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
</style>