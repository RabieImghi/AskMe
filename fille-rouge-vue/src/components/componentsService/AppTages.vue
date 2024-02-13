<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
                <div class="search">
                    <input  v-model="searchQuery" style="width:400px" type="search" name="search" id="saerchUesr" class="form-control" placeholder="Search Users">
                </div>
            </div> 
            <section class="tageList container-mf border-bottom pb-4 pt-4  ">
                <div class="tage d-flex flex-wrap gap-3 justify-content-between">
                    <div class="tagelists border p-3 rounded-1 shadow" v-for="tage in filteredUsers" :key="tage.id">
                        <div class="TageTitle d-flex gap-4">
                            <img src="../../assets/img/tage.png" width="35px" alt="">
                            <span class="fw-bold text-secondary h3 ">{{tage.name}}</span>
                        </div>
                        <div class="text-secondary">
                            {{ tage.description }}
                        </div>
                    </div>
                    
                </div>
            </section>
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
    .tagelists{
        min-width: 360px;
        max-width: 360px;
    }
</style>