<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Category</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <div class="text-end">
                <button class="btn btn-primary" @click="showModal = !showModal">Add Category</button>
            </div>
            <table class="w-100">
                <thead >
                    <tr class="itemsPermission">
                        <th class="px-3">Category Name</th>
                        <th class="px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="Category in Categorys" :key="Category.id"  class="itemsPermission">
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ Category.name }}</p>
                        </td>
                        <td class="d-flex flex-wrap gap-4 px-3" >
                            <button class="btn btn-danger" @click="deleteTage(Category.id,Category.name)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zm2.5 2.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5zm-2 0a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5zm4 0a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0v-3a.5.5 0 0 0-.5-.5z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.06L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                            <button class="btn btn-primary" @click="showModal2 = !showModal2, updateTage(Category.id,Category.name)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.146 2.354a1.5 1.5 0 0 1 2.121 0l1.5 1.5a1.5 1.5 0 0 1 0 2.121l-8.5 8.5a.5.5 0 0 1-.168.11l-5 2a.499.499 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l8.5-8.5zm1.5 1.5L12 4.5 4.5 12 3 13.5l1.5-1.5L12 4.5l1.646-1.646a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
        <div class="overlay" @click="showModal = !showModal" v-bind:class="{ 'show': !showModal }"></div>
        <div class="model addpermission"  v-bind:class="{ 'show': !showModal }">
            <div class="p-4">
                <div>
                    <span class="h4 fw-bold title">New Category</span>
                    <div class="mt-3">
                        <p class="text-secondary">Add information and add new Category.</p>
                    </div>
                    <form>
                        <div>
                            <label class="fw-bold h6 text-secondary">Role</label>
                            <input name="name" type="text" class="form-control"  v-model="categoryName">
                        </div>
                        <div class="submitButton">
                            <button type="button" @click="submitForm" class="btn btn-primary">Add New Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay" @click="showModal2 = !showModal2" v-bind:class="{ 'show': !showModal2 }"></div>
        <div class="model update"  v-bind:class="{ 'show': !showModal2 }">
            <div class="p-4">
                <div>
                    <span class="h4 fw-bold title">Update Category</span>
                    <div class="mt-3">
                        <p class="text-secondary">Update information of Category.</p>
                    </div>
                    <form>
                        <div>
                            <label class="fw-bold h6 text-secondary">name</label>
                            <input name="name" type="text" class="form-control"  v-model="categoryName">
                        </div>
                        <div class="submitButton">
                            <button type="button" @click="submitFormUpdate" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
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
                        <p>Are you sure you want to delete this Category?
                            <span class="cursor-point fw-normal m-2 prmissions">{{ categoryName }}</span> </p>
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
</style>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import { useStore } from '@/store';

export default {
    name: "AppAdminPermissions",
    data() {
        return {
            Categorys: [],
            showModal: true,
            showModal2: true,
            showConfirmModal: false,
            categoryId: null,
            categoryName:null,
        }
    },
    // components: { select2 },
    mounted() {
        this.getTages();
    },  
    methods: {
        getTages() {
            const store = useStore();
            axios.get(`${store.URL}getAllCategory`, {
                headers: { 'Authorization': `Bearer ${store.token}` }
            }).then(response => {
                this.Categorys = response.data.Categorys;
            });
        },
        submitForm() {
            const store = useStore();
            var formData = new FormData();
            formData.append('name', this.categoryName);
            let response = axios.post(`${store.URL}addNewCategory`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            });
            if(response){
                if(response.data.error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.data.error,
                    })  
                }
                this.getTages();
                this.showModal = !this.showModal;
                Swal.fire(
                    'Success',
                    'Category has been added successfully',
                    'success'
                )
            }
        },
        submitFormUpdate() {
            const store = useStore();
            var formData = new FormData();
            formData.append('name', this.categoryName);
            formData.append('id', this.categoryId);
            axios.post(`${store.URL}updateCategory`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getTages();
                this.showModal2 = !this.showModal2;
                Swal.fire(
                    'Success',
                    'Category has been updated successfully',
                    'success'
                )
            }).catch(() => {
                Swal.fire(
                    'Error',
                    'Category has not been updated',
                    'error'
                )
            })
        },
        deleteTage(id,name) {
            this.categoryId = id;
            this.categoryName = name;
            this.showConfirmModal = !this.showConfirmModal;
        },
        updateTage(id,name) {
            this.categoryId = id;
            this.categoryName = name;
        },
        
        confirmDelete(){
            const store = useStore();
            var formData = new FormData();
            formData.append('id', this.categoryId);
            axios.post(`${store.URL}deleteCategory`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getTages();
                this.categoryName = null;
                this.showConfirmModal = !this.showConfirmModal;
                Swal.fire(
                    'Success',
                    'Category has been deleted successfully',
                    'success'
                )
            }).catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
        }
    },
}
</script>