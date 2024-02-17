<template>
    <div class="contentPage pe-4">
        <div class="bg-white sectionUser shadow">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
                <div class="search">
                    <input  v-model="searchQuery" style="width:400px" type="search" name="search" id="saerchUesr" class="form-control" placeholder="Search Users">
                </div>
            </div> 
            <section class="userList container-mf border-bottom pb-4 pt-4  ">
                <div class="d-flex flex-wrap gap-3 justify-content-between">
                    <div v-for="user in filteredUsers" :key="user.id"
                        class="user translateEffect cursor-point border d-flex align-items-start gap-3 p-2">
                        <div class="leftInfo d-flex flex-column gap-3 align-items-center">
                            <img src="../../../assets/img/user.png" width="60px" alt="">
                            <span class="color-premary fw-bold">{{user.name}}</span>
                            <button  :class="user.Level">{{user.Level}}</button>
                        </div>
                        <div class="rightInfo d-flex flex-column">
                            <div class='color-premary fw-bold h4'>Total Questions</div>
                            <div class="fw-bold h5">{{user.question}}</div>
                            <p class="text-secondary fw-bold">
                                {{user.description}}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
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
                users : [
                    {id:1, name:'Rabie_Imghi',Level:'Explainer',question:2043,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:2, name:'Hamza_Bnk',Level:'Beginner',question:3782,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:3, name:'KamalMni',Level:'Enlightened',question:4738,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:4, name:'KhalidFkd',Level:'Beginner',question:1293,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:5, name:'YassirLonu',Level:'Professional',question:4321,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:6, name:'YassinInou',Level:'Enlightened',question:2311,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:7, name:'HakmiBodgal',Level:'Explainer',question:1903,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:8, name:'KarimaAmdgh',Level:'Beginner',question:1092,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:9, name:'SamirUkd',Level:'Professional',question:2343,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:10,name:'HassanHJK',Level:'Explainer',question:5043,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:11,name:'JamalJBL',Level:'Enlightened',question:5043,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:12, name:'Hamza_Bnk',Level:'Beginner',question:3782,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:13, name:'KamalMni',Level:'Enlightened',question:4738,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:14, name:'KhalidFkd',Level:'Beginner',question:1293,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:15, name:'YassirLonu',Level:'Professional',question:4321,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:16, name:'YassinInou',Level:'Enlightened',question:2311,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:17, name:'HakmiBodgal',Level:'Explainer',question:1903,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                    {id:18, name:'KarimaAmdgh',Level:'Beginner',question:1092,description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum has been the  industry's standard dummy"},
                ],
                searchQuery: ''
            };
        },
        computed: {
            filteredUsers() {
                return this.users.filter(user => {
                    return user.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                });
            }
        }
        
    }
</script>
<style>
    .sectionUser{
        min-height: calc( 100vh - 80px );
    }
    .user{
        min-width: 360px;
        max-width: 360px;
    }
</style>