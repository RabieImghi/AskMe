<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Permissions</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <div class="text-end">
                <button class="btn btn-primary" @click="showModal = !showModal">Add Permission</button>
            </div>
            <table class="table">
                <thead class="">
                    <tr>
                        <th class="px-3">Role</th>
                        <th class="px-3">Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(routes, user) in permissions" :key="user">
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start" >{{ user }}</p>
                        </td>
                        <td class="d-flex flex-wrap gap-4 px-3" >
                        <span @click="deletPermission(route.id,route.name)" class="cursor-point fw-normal mb-1 prmissions" v-for="(route, index) in routes" :key="index">
                            {{ route.name }}
                        </span>
                    </td>
                    </tr>
                </tbody>
            </table>    
            <section v-if="isLoading" style="height: 68vh;" class="d-flex align-items-center justify-content-center"> 
                <Loader/>
            </section>  
        </div>
        <div class="overlay" @click="showModal = !showModal" v-bind:class="{ 'show': !showModal }"></div>
        <div class="model addpermission"  v-bind:class="{ 'show': !showModal }">
            <div class="p-4">
                <div>
                    <span class="h4 fw-bold title">New Permission</span>
                    <div class="mt-3">
                        <p class="text-secondary">Add information and add new Permission.</p>
                    </div>
                    <form>
                        <div>
                            <label class="fw-bold h6 text-secondary">Role</label>
                            <select name="role_id" class="form-select"  v-model="role_id">
                                <option v-for="role in Roles" :key="role.id" :value="role.id">{{role.text}}</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label class="fw-bold h6 text-secondary">Permissions</label>
                            <select2 class="form-select custom-select2" :options="options"  @input="value => { selected = value }" :name="tableName" :multiple="true"></select2>
                        </div>
                        <div class="submitButton">
                            <button type="button" @click="submitForm" class="btn btn-primary">Add New Permissions</button>
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
                        <p>Are you sure you want to delete this permission?
                            <span class="cursor-point fw-normal m-2 prmissions">{{ permissionName }}</span> </p>
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
    .role-width {
        width: 40px !important;
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
import select2 from "./AppSelect22.vue"
import { useStore } from '@/store';
import Swal from 'sweetalert2';
import Loader  from '../User/AppLoader';
export default {
    name: "AppAdminPermissions",
    data() {
        return {
            permissions: [],
            showModal: true,
            showConfirmModal: false,
            toBeDeleted: null,
            permissionName:null,
            role_id:null,
            selected: [],
            tableName:'permissions_id[]',
            options: [],
            Roles: [],
            isLoading: true
        }
    },
    components: { select2,Loader },
    mounted() {
        const store = useStore();
        this.getPermissions();
        axios.get(`${store.URL}getPemissionsAndRole`,{
                headers: { 'Authorization': `Bearer ${store.token}` }
        })
        .then(response =>{
            this.options=response.data.permsissions;
            this.Roles=response.data.roles;
        });
    },  
    methods: {
        getPermissions() {
            const store = useStore();
            axios.get(`${store.URL}getRolePemissions`,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(response => {
                console.log(response.data.permissions);
                this.permissions = response.data.permissions;
                this.isLoading = false;
            });
        },
        submitForm() {
            const store = useStore();
            let formData = {
                role_id: this.role_id,
                permissions_id: this.selected,
            };
            axios.post(`${store.URL}addNewPermissions`,{formData: formData},{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getPermissions();
                this.showModal = !this.showModal;
                Swal.fire(
                    'Success',
                    'New Permission has been added successfully',
                    'success'
                )
            }).catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
        },
        deletPermission(id,name) {
            this.toBeDeleted = id;
            this.permissionName = name;
            this.showConfirmModal = !this.showConfirmModal;
        },
        confirmDelete(){
            const store = useStore();
            axios.post(`${store.URL}deleteNewPermissions`,{id: this.toBeDeleted},{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(() => {
                this.getPermissions();
                this.showConfirmModal = !this.showConfirmModal;
                Swal.fire(
                    'Success',
                    'Permission has been deleted successfully',
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