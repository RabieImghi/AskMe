<template>
    <div class="sectionUser">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Manage Users</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <div class="tableSect">

            
            <table class="w-100 ">
                <thead >
                    <tr class="itemsPermission">
                        <th class="px-3">Name</th>
                        <th class="px-3">Firstname</th>
                        <th class="px-3">Lastname</th>
                        <th class="px-3">Email</th>
                        <th class="px-3">Role</th>
                        <th class="px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id"  class="itemsPermission">
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ user.name }}</p>
                        </td>
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ user.firstName }}</p>
                        </td>
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ user.lastName }}</p>
                        </td>
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ user.email }}</p>
                        </td>
                        <td class="px-3">
                            <button class="btn btn-light" @click="changeUserRole(user.id)">{{ user.role }}</button>
                        </td>
                        <td class="d-flex flex-wrap gap-4 px-3" >
                            <button class="btn btn-danger" @click="deleteTage(user.id,user.name)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zm2.5 2.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5zm-2 0a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5zm4 0a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.06L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                            <button v-if="user.isBanne=='0'" class="btn btn-warning" @click="banneUser(user.id)">
                                Banne_User
                            </button>
                            <button v-else class="btn btn-danger" @click="banneUser(user.id)">
                                Remove_Banne
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <section v-if="isLoading" style="height: 68vh;" class="d-flex align-items-center justify-content-center"> 
                <Loader/>
            </section>  
            <div v-if="nbPage > 1" class="navigation d-flex justify-content-end gap-2 align-items-center pt-3 pb-3">
                <button @click="previewsPage()" class="btn btn-dark fw-bold">&lt;</button>
                <button v-for="nb in nbPage" :key="nb.id" :class="{ activeClass: page === nb } " class="btn btn-light border" @click="getPage(nb)">{{nb}}</button>
                <button @click="nextPage()" class="btn btn-dark fw-bold">></button>
            </div> 
        </div>
        <div v-if="showConfirmModal" class="modal shad show d-block" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content confirm">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" @click="showConfirmModal = false"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this User?
                            <span class="cursor-point fw-normal m-2 prmissions">{{ userName }}</span> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="showConfirmModal = false">No</button>
                        <button type="button" class="btn btn-danger" @click="confirmDelete">Confirme</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>

    @media screen and (max-width: 930px){
       .tableSect{
              overflow-x: auto;
       }
    }
    table {
        border-collapse: separate;
        border-spacing: 0 20px;
    }

    table tr {
        box-shadow: 2px 3px 10px rgba(211, 211, 211, 0.635);
        border-radius: 3px;
        padding: 20px;
    }
    table tr:hover {
        cursor: pointer;
        transform: translateY(-2px);
        background-color: #f5f5f580;
    }
    table td, table th {
        padding: 10px 0;
    }
    .model {
        position: fixed;
        right: 0;
        top: 10vh;
        width: 400px;
        height: 90vh;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
        overflow: auto;
    }
    .shad {
        background-color: rgba(75, 75, 75, 0.253);
    }
    .confirm{
        background: white;
        margin-top: 100px;
    }
    .model.show {
        display: block !important;
        transform: translateX(0);
    }
    .overlay.show {
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 10vh;
        left: 0;
        width: 100%;
        height: 90vh;
        transform: translateX(0);
        transition: transform 0.3s ease-out;
        opacity: 0.2;
    }
    .prmissions{
        background-color: #f0f0f0;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .prmissions:hover{
        background-color: #e0e0e0;
        transform: translateY(-2px);
        transition: all 0.7s ease;
    }
    .user{
        color: #0d6efd;
    }
    .guest{
        color: #198754;
    }
    .admin{
        color: #dc3545;
    
    }
    .title{
        color: #474747;
    }
    .select2-selection__rendered{
        display: flex !important;
        flex-wrap: wrap !important;
    }
    .select2-selection__choice {
        background-color: #007bff !important;
        border-color: #0069d9 !important;
        color: #fff !important;
        display: flex !important;
        flex-wrap: wrap;
    }
    .select2-selection__choice__remove{
        background: white !important;
        color: black;
    }
    .submitButton{
        position: fixed;
        bottom: 5vh;
        right: 20px;
    }
    .activeClass{
        background-color: black !important;
        color: white;
    
    }
</style>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import {useStore} from '../../store';
import Loader  from '../User/AppLoader';
export default {
    name: "AppManageUsers",
    data() {
        return {
            users : [],
            showModal: true,
            showModal2: true,
            showConfirmModal: false,
            skip: 0,
            count:0,
            page:1,
            nbPage:1,
            isLoading: true,
            userName:null,
            userId:null,
        }
    },
    mounted() {
        this.getUsers();
    },  
    components:{
        Loader
    },
    methods: {
        getUsers() {
            const store = useStore();
            axios.get(`${store.URL}getusers/${this.skip}`,{
                headers: {'Authorization': `Bearer ${store.token}` }
            })
            .then(response =>{
                this.isLoading = false;
                this.users = response.data.users;
                this.count = response.data.userCount;
                this.nbPage = Math.ceil(this.count / 12);
            }).catch(error =>{
                console.log(error)
            });
        },
        
        deleteTage(id,name) {
            this.userId = id;
            this.userName = name;
            this.showConfirmModal = !this.showConfirmModal;
        },
        confirmDelete(){
            const store = useStore();
            var formData = new FormData();
            formData.append('id', this.userId);
            axios.post(`${store.URL}deleteUser`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getUsers();
                this.userName = null;
                this.showConfirmModal = !this.showConfirmModal;
                Swal.fire(
                    'Success',
                    'User has been deleted successfully',
                    'success'
                )
            }).catch(() =>{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
        },
        nextPage(){
            if(this.skip < this.count - 12){
                this.skip += 12;
                this.page += 1;
                this.getUsers(); 
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            }
        },
        previewsPage(){
            if(this.skip >= 12){
                this.skip -= 12;
                this.page -= 1;
                this.getUsers();
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            }
        },
        getPage(page){
            this.skip = page * 12 - 12;
            this.page = page;
            this.getUsers();
            this.$nextTick(() => {
                document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
            });
        },
        banneUser(id){
            const store = new useStore();
            var formData = new FormData();
            formData.append('id', id);
            axios.post(`${store.URL}banneUser`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            }).then(response=>{
                console.log(response.data.message)
                this.getUsers();
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
        changeUserRole(id){
            const store = new useStore();
            var formData = new FormData();
            formData.append('id', id);
            axios.post(`${store.URL}changeUser`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            }).then(response=>{
                console.log(response.data.message)
                this.getUsers();
                Swal.fire(
                    'Success',
                    ' The role has been changed successfully',
                    'success'
                )
            }).catch(() =>{
                Swal.fire(
                    'Error',
                    'An error occurred',
                    'error'
                )
            });
        }
    },
}
</script>