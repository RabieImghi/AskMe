<template>
    <div>
        <aside class="bg-white pt-4">
            <section class="addQuesion container-mf ">
                <router-link to="/AskQuesion" class="btn btn-primary w-100 fw-bold">Ask A Question</router-link>
            </section>
            <section class="countStatique container-mf border-top mt-4 pt-4">
                <div class="content bg-white">
                    <div class="row">
                        <div class="col-6 pt-4 pb-4 border">
                            <div class="p-2 contentColumn text-secondary fw-bold d-flex flex-column gap-2 text-center border-left border-primary ">
                                <span class="text-primary">Question</span>  1000
                            </div>
                        </div>
                        <div class="col-6 pt-4 pb-4 border ">
                            <div class="p-2 contentColumn text-secondary fw-bold d-flex flex-column gap-2 text-center border-left border-danger">
                                <span class="text-danger">Answers</span>  1999
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 pt-4 pb-4 border ">
                            <div class="p-2 contentColumn text-secondary fw-bold d-flex flex-column gap-2 text-center border-left border-success">
                                <span class="text-success">Best Answers</span>  783
                            </div>
                        </div>
                        <div class="col-6 pt-4 pb-4 border ">
                            <div class="p-2 contentColumn text-secondary fw-bold d-flex flex-column gap-2 text-center border-left border-warning">
                                <span class="text-warning">Users</span>  232
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="topMembers container-mf border-top mt-4 pt-4">
                <div class="headerMembers d-flex gap-3 align-items-end">
                    <img src="../assets/img/userList.png" width="50px" alt="User">
                    <span class="h3 text-color-primary fw-bold">Top Users</span>   
                </div>
                <div class="BodMembers px-2 mt-3">
                    <div class="user d-flex justify-content-between align-items-center flex-wrap border mt-2 p-2">
                        <img src="../assets/img/user.png" width="60px" alt="">
                        <div class="infoUser fw-bold d-flex flex-column align-items-center">
                            <span class="color-premary">Rabie_Imghi</span>
                            <span class="text-secondary">9 Question</span>
                        </div>
                        <button  class="Professional">Professional</button>
                    </div>
                    <div class="user d-flex justify-content-between align-items-center flex-wrap border mt-2 p-2">
                        <img src="../assets/img/user.png" width="60px" alt="">
                        <div class="infoUser fw-bold d-flex flex-column align-items-center">
                            <span class="color-premary">Rabie_Imghi</span>
                            <span class="text-secondary">9 Question</span>
                        </div>
                        <button  class="Professional">Professional</button>
                    </div>
                    <div class="user d-flex justify-content-between align-items-center flex-wrap border mt-2 p-2">
                        <img src="../assets/img/user.png" width="60px" alt="">
                        <div class="infoUser fw-bold d-flex flex-column align-items-center">
                            <span class="color-premary">Rabie_Imghi</span>
                            <span class="text-secondary">9 Question</span>
                        </div>
                        <button  class="Professional">Professional</button>
                    </div>
                </div>
                
            </section>
        </aside>
    </div>
</template>
<script>
    export default{
        name: 'AppAside',
    }
</script>
<style>
    aside{
        height: calc(100vh - 80px);
        box-shadow: 5px 10px 20px rgba(128, 128, 128, 0.245);
    }
    .col-6{
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .contentColumn{
        border-left: 4px solid ;
    }
</style>