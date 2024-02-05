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
                <div class="filtrBar container-mf d-flex justify-content-between align-items-center">
                    <div class="filter d-flex justify-content-between align-items-center gap-2">
                        <span class="text-secondary fw-bold">Filtr_By</span>
                        <select name="" id="" class="form-select shadow-sm">
                            <option value="1">Must read Question</option>
                            <option value="1">Must read Question 1</option>
                            <option value="1">Must read Question 11</option>
                        </select>
                    </div>
                    <div class="search d-flex justify-content-betweent align-items-center gap-2">
                        <span class="text-secondary fw-bold">Type_Search</span>
                        <select name="" id="" class="w-50 form-select shadow-sm">
                            <option value="1">Title</option>
                            <option value="2">Tages</option>
                        </select>
                        <input type="search" class="shadow-sm form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
            <div class="border-bottom pb-4 pt-4">
                <div class="container-mf row">
                    <div class="image col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
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
                            <span class="color-premary fw-bold">Rabie Imghi</span>
                            <button  class="Professional">Professional</button>
                            <span class="text-secondary">Asked : <span class="text-danger">April 19, 2023</span></span>
                            <span class="text-secondary">In : <span class="text-danger">PHP</span></span>
                        </div>
                        <span class=" h3 fw-bold">What are your thoughts on Google Analytics vs other analytics platforms?</span>
                        <p class="text-secondary pt-3">Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that  I need to check.  
                        We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that 
                        I need to check.  We are not at the point of using </p>
                        <div class="Tages  d-flex gap-3 align-items-center flex-wrap">
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="statistique shadow d-flex justify-content-between align-items-center p-3 mt-3 ">
                            <div class="statiqueInfo d-flex gap-5 align-items-centerlign">
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/answerImage.png" width="30px" alt="answerImage">
                                    0 Answers
                                </span>
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/view.png" width="30px" alt="answerImage">
                                    0 Views
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
            <div class="border-bottom pb-4 pt-4">
                <div class="container-mf row">
                    <div class="image col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
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
                            <span class="color-premary fw-bold">Rabie Imghi</span>
                            <button  class="Professional">Professional</button>
                            <span class="text-secondary">Asked : <span class="text-danger">April 19, 2023</span></span>
                            <span class="text-secondary">In : <span class="text-danger">PHP</span></span>
                        </div>
                        <span class=" h3 fw-bold">What are your thoughts on Google Analytics vs other analytics platforms?</span>
                        <p class="text-secondary pt-3">Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that  I need to check.  
                        We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that 
                        I need to check.  We are not at the point of using </p>
                        <div class="Tages  d-flex gap-3 align-items-center flex-wrap">
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="statistique shadow d-flex justify-content-between align-items-center p-3 mt-3 ">
                            <div class="statiqueInfo d-flex gap-5 align-items-centerlign">
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/answerImage.png" width="30px" alt="answerImage">
                                    0 Answers
                                </span>
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/view.png" width="30px" alt="answerImage">
                                    0 Views
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
            <div class="border-bottom pb-4 pt-4">
                <div class="container-mf row">
                    <div class="image col-1 gap-3 d-flex flex-column justify-content-center align-items-center">
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
                            <span class="color-premary fw-bold">Rabie Imghi</span>
                            <button  class="Professional">Professional</button>
                            <span class="text-secondary">Asked : <span class="text-danger">April 19, 2023</span></span>
                            <span class="text-secondary">In : <span class="text-danger">PHP</span></span>
                        </div>
                        <span class=" h3 fw-bold">What are your thoughts on Google Analytics vs other analytics platforms?</span>
                        <p class="text-secondary pt-3">Recently heard about Heap which seems pretty cool, but I’m not sure if it would really be valuable, or simply another tool that  I need to check.  
                        We are not at the point of using HubSpot/Marketo yet so Heap’s free but I’m not sure if it would really be valuable, or simply another tool that 
                        I need to check.  We are not at the point of using </p>
                        <div class="Tages  d-flex gap-3 align-items-center flex-wrap">
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                            <div class="user d-flex gap-2 justify-content-between align-items-center flex-wrap border mt-2 p-2">
                                <img src="../../assets/img/tage.png" width="30px" alt="">
                                <div class="infoUser fw-bold d-flex flex-column align-items-center">
                                    <span class="color-premary">Tage_Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="statistique shadow d-flex justify-content-between align-items-center p-3 mt-3 ">
                            <div class="statiqueInfo d-flex gap-5 align-items-centerlign">
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/answerImage.png" width="30px" alt="answerImage">
                                    0 Answers
                                </span>
                                <span class="border bg-white p-1 rounded-1 text-secondary fw-bold d-flex gap-2 align-items-center">
                                    <img src="../../assets/img/view.png" width="30px" alt="answerImage">
                                    0 Views
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
            <div class="pagination container-mf d-flex pt-4 justify-content-end">
                <ul class="nav">
                    <li class="p-3 fw-bold text-secondary border mx-2">&lt;</li>
                    <li class="p-3 fw-bold text-secondary border mx-2">1</li>
                    <li class="p-3 fw-bold border mx-2 btn-primary btn">2</li>
                    <li class="p-3 fw-bold text-secondary border mx-2">3</li>
                    <li class="p-3 fw-bold text-secondary border mx-2">&gt;</li>
                </ul>
            </div>
        </section>
       
    </div>
</template>
<script>
    export default{
        name: 'AppHome',
    }
</script>
<style>
    .checkAuth{
        box-shadow: 0px -6px 10px lightgray;
    }
    .QuestionSection{
        background: white;
    }
    .statistique{
        background: #FDFEF9;
    }
</style>