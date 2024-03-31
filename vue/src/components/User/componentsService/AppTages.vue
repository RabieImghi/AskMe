<template>
    <div class="contentPage pe-4">
        <div class="sectionBadge bg-white shadow">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>
                <div class="search">
                    <input v-model="searchQuery" style="width:400px" type="search" name="search" id="saerchUesr"
                        class="form-control" placeholder="Search Users">
                </div>
            </div>
            <!-- <section class="tageList container-mf border-bottom pb-4 pt-4  ">
                <div class="tage d-flex flex-wrap gap-3 justify-content-between">
                    <div class="translateEffect cursor-point tagelists border p-3 rounded-1" 
                    v-for="tage in filteredUsers" :key="tage.id">
                        <div class="TageTitle d-flex gap-4">
                            <img src="../../../assets/img/tage.png" width="35px" alt="">
                            <span class="fw-bold text-secondary h3 ">{{tage.name}}</span>
                        </div>
                        <div class="text-secondary">

                            {{ tage.description }}
                        </div>
                    </div>
                    
                </div>
            </section> -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2" v-for="tage in filteredUsers" :key="tage.id">
                    <div class="card border-0 bg-light rounded shadow-sm">
                        <div class="card-body p-4">
                            <h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                                </svg>
                                {{tage.name}}
                            </h5>
                                <div class="mt-3"> 
                                    <span class="text-muted d-block">
                                        {{ tage.description }}
                                    </span>
                                </div>
                            <div class="mt-3"> <a href="#" class="btn btn-primary">View All Post</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center text-secondary fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppBadge',
        data(){
            return{
                tages : [
                     {id:1, name:'php', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"},  
                     {id:2, name:'laravel ', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:3, name:'js ', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:4, name:'boostrap', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:5, name:'jquery', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:6, name:'jira', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:7, name:'github', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:8, name:'trilo', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:9, name:'git', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:10, name:'xd', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                     {id:11, name:'tailweend', description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"}, 
                ],
                searchQuery: ''
            };
        },
        computed: {
            filteredUsers() {
                return this.tages.filter(tage => {
                    return tage.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                });
            }
        }
        
    }
</script>
<style>
    .sectionBadge{
        min-height: calc( 100vh - 80px);
    }
    .tagelists{
        min-width: 360px;
        max-width: 360px;
    }
</style>