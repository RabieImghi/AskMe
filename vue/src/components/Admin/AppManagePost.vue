<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Post</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <table class="w-100">
                <thead >
                    <tr class="itemsPermission">
                        <th class="px-3">User Name</th>
                        <th class="px-3">Post Category</th>
                        <th class="px-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts" :key="post.id"  class="itemsPermission"
                    @click="afficheDetail(post.id,post.title,post.content,post.isArchive)">
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ post.username }}</p>
                        </td>
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ post.category }}</p>
                        </td>
                        <td class="px-3">
                            <p v-if="post.isArchive == '0'" class="fw-bold mb-1 text-start btn btn-success">Active</p>
                            <p v-else class="fw-bold mb-1 text-start btn btn-danger">Is Archive</p>
                        </td>

                    </tr>
                </tbody>
            </table>   
            <section v-if="isLoading" style="height: 68vh;" class="d-flex align-items-center justify-content-center"> 
                <Loader/>
            </section>  
            <div v-if="nbPage > 1" class="navigation d-flex justify-content-end gap-2 align-items-center pt-3 pb-3">
                <button @click="previewsPage()" class="btn btn-dark fw-bold">&lt;</button>
                <button v-for="nb in nbPage" :key="nb.id" :class="{ activeClass: page === nb } " class="btn btn-light border" @click="getPage(nb)">{{nb}}</button>
                <button @click="nextPage()" class="btn btn-dark fw-bold">></button>
            </div> 
        </div>
        <div v-if="showConfirmModal" class="modal shad show d-block lddd" style="margin-top: 100px;" tabindex="-1"
        @click="this.showConfirmModal = !this.showConfirmModal"
        >
            <div class="modal-dialog modal-lg  bg-white">
                <div class="modal-content confirm">
                    <div class="modal-header">
                        <h5 class="modal-title">Post Details</h5>
                        <button type="button" class="btn-close" @click="showConfirmModal =true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="box-shadow: none;">
                            <div class="row">
                                <div class="col-2 fw-bold text-secondary">
                                    Post Title
                                </div>
                                <div class="col">
                                {{ postTitle }} 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-2 fw-bold text-secondary">
                                    Post content
                                </div>
                                <div class="col" v-html="postcontent"> </div>
                            </div>
                            <div class="row">
                                <div class="col-2 fw-bold text-secondary">
                                    Status
                                </div>
                                <div class="col">
                                    <p v-if="postStatus == '0'" class="fw-bold mb-1 text-start btn btn-success">Active</p>
                                    <p v-else class="fw-bold mb-1 text-start btn btn-danger">Is Archive</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="showConfirmModal = true">No</button>
                        <button type="button" class="btn btn-danger" @click="changeStatus">Change status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.lddd{
    background: rgba(211, 211, 211, 0.315);
}
</style>
<script>
import axios from 'axios';
import {useStore} from '../../store';
import Swal from 'sweetalert2';
import Loader  from '../User/AppLoader';
export default {
    name: "AppManagePost",
    data() {
        return {
            posts: [],
            showModal: true,
            showConfirmModal: false,
            skip: 0,
            count:0,
            page:0,
            nbPage:1,
            isLoading: true,
            postid: null,
            postTitle:null,
            postStatus:null,
            postcontent:null
        }
    },
    mounted() {
        this.getPost();
    }, 
    components:{
        Loader
    }, 
    methods: {
        getPost() {
            const store = useStore();
            axios.get(`${store.URL}getPostManage/${this.skip}`,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(response =>{
                this.posts=response.data.posts;
                this.count=response.data.count;
                this.nbPage = Math.ceil(this.count / 6);
                this.isLoading = false;
            }).catch(error =>{
                console.log(error)
            });
        },
        afficheDetail(id,title,content,statue) {
            this.postid = id;
            this.postTitle = title;
            this.postcontent= content;
            this.postStatus = statue;
            this.showConfirmModal = !this.showConfirmModal;
        },
        changeStatus(){
            const store = useStore();
            var formData = new FormData();
            formData.append('id', this.postid);
            axios.post(`${store.URL}changeStatusPost`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getPost();
                Swal.fire(
                    'Success',
                    'The status has been changed successfully',
                    'success'
                )
            }).catch(() =>{
                Swal.fire(
                    'Error',
                    'An error occurred',
                    'error'
                )
            });
        },
        nextPage(){
            if(this.skip < this.count - 6){
                this.skip += 6;
                this.page += 1;
                this.getTages(); 
            }
        },
        previewsPage(){
            if(this.skip >= 6){
                this.skip -= 6;
                this.page -= 1;
                this.getTages();
            }
        },
        getPage(page){
            this.skip = page * 6 - 6;
            this.page = page;
            this.getTages();
        },
    },
}
</script>