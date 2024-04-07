<template>
    <div class="contentPage pe-4">
        <div class="sectionBadge bg-white shadow sectionUser">
            <div class="border-bottom container-mf pt-4 pb-4 d-flex align-items-center justify-content-between">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>
                <div class="search">
                    <input v-model="searchQuery" style="width:400px" type="search" name="search" id="saerchUesr"
                        class="form-control" placeholder="Search Users">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2" v-for="tage in tages" :key="tage.id">
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
                                        {{ tage.descriprtion }}
                                    </span>
                                </div>
                            <div class="mt-3"> 
                                <router-link class="btn btn-primary" to="/user/Servises/Posts" @click="storeId(tage.id)">
                                    View All Post
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="nbPage > 1" class="navigation d-flex justify-content-end gap-2 align-items-center pt-3 pb-3">
                    <button @click="previewsPage()" class="btn btn-primary fw-bold">&lt;</button>
                    <button v-for="nb in nbPage" :key="nb.id" :class="{ activeClass: page === nb } " class="btn btn-light border" @click="getPage(nb)">{{nb}}</button>
                    <button @click="nextPage()" class="btn btn-primary fw-bold">></button>
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
    import axios from 'axios';
    import {useStore} from '@/store';
    export default{
        name: 'AppBadge',
        data(){
            const store = useStore();
            return{
                tages : [],
                skip: store.skip,
                count:0,
                page:1,
                nbPage:1,
                isLoading: true,
                searchQuery: ''
            };
        },
        computed: {
            filteredUsers() {
                return this.tages.filter(tage => {
                    return tage.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                });
            }
        },
        mounted(){
            this.fetchTages();
        },
        methods:{
            storeId(id){
                const store = useStore();
                store.setTageId(id);
            },
            fetchTages(){
                const store = useStore();
                let formData = new FormData();
                formData.append('type','user');
                axios.post(`${store.URL}getTages/${this.skip}`, formData).then(response => {
                    this.isLoading = false;
                    this.tages = response.data.tages;
                    this.count = response.data.count;
                    this.nbPage = Math.ceil(this.count / 9);
                });
            },
            nextPage(){
                if(this.skip < this.count - 9){
                    this.skip += 9;
                    this.page += 1;
                    this.fetchTages(); 
                    this.$nextTick(() => {
                        document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            previewsPage(){
                if(this.skip >= 9){
                    this.skip -= 9;
                    this.page -= 1;
                    this.fetchTages();
                    this.$nextTick(() => {
                        document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                    });
                }
            },
            getPage(page){
                this.skip = page * 9 - 9;
                this.page = page;
                this.fetchTages();
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            },
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