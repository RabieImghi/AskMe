<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Tages</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <div class="text-end">
                <button class="btn btn-primary" @click="showModal = !showModal">Add Tages</button>
            </div>
            <table class="w-100">
                <thead >
                    <tr class="itemsPermission">
                        <th class="px-3">Tage Name</th>
                        <th class="px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="tage in tages" :key="tage.id"  class="itemsPermission">
                        <td class="px-3">
                            <p class="fw-bold mb-1 text-start">{{ tage.name }}</p>
                        </td>
                        <td class="d-flex flex-wrap gap-4 px-3" >
                            <button @click="deleteTage(tage.id,tage.name)">Delete</button>
                            <button @click="showModal2 = !showModal2, updateTage(tage.id,tage.name)" >Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>   
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
                            <input name="name" type="text" class="form-control"  v-model="tageName">
                        </div>
                        <div class="submitButton">
                            <button type="button" @click="submitForm" class="btn btn-primary">Add New Tage</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay" @click="showModal2 = !showModal2" v-bind:class="{ 'show': !showModal2 }"></div>
        <div class="model update"  v-bind:class="{ 'show': !showModal2 }">
            <div class="p-4">
                <div>
                    <span class="h4 fw-bold title">Update Tages</span>
                    <div class="mt-3">
                        <p class="text-secondary">Update information of Tages.</p>
                    </div>
                    <form>
                        <div>
                            <label class="fw-bold h6 text-secondary">name</label>
                            <input name="name" type="text" class="form-control"  v-model="tageName">
                        </div>
                        <div class="submitButton">
                            <button type="button" @click="submitFormUpdate" class="btn btn-primary">Update Tage</button>
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
                            <span class="cursor-point fw-normal m-2 prmissions">{{ tageName }}</span> </p>
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
// import select2 from "./AppSelect2.vue"
export default {
    name: "AppAdminPermissions",
    data() {
        return {
            tages: [],
            showModal: true,
            showModal2: true,
            showConfirmModal: false,
            tageId: null,
            tageName:null,
        }
    },
    // components: { select2 },
    mounted() {
        this.getTages();
    },  
    methods: {
        getTages() {
            axios.get('http://127.0.0.1:8000/api/getAllTages')
            .then(response =>{
                this.tages=response.data.tages;
            }).catch(error =>{
                console.log(error)
            });
        },
        submitForm() {
            var formData = new FormData();
            formData.append('name', this.tageName);
            axios.post('http://127.0.0.1:8000/api/addNewTage',formData)
            .then(() => {
                this.getTages();
                this.showModal = !this.showModal;
            });
        },
        submitFormUpdate() {
            var formData = new FormData();
            formData.append('name', this.tageName);
            formData.append('id', this.tageId);
            axios.post('http://127.0.0.1:8000/api/updateTage',formData)
            .then(() => {
                this.getTages();
                this.showModal2 = !this.showModal2;
            });
        },
        deleteTage(id,name) {
            this.tageId = id;
            this.tageName = name;
            this.showConfirmModal = !this.showConfirmModal;
        },
        updateTage(id,name) {
            this.tageId = id;
            this.tageName = name;
        },
        
        confirmDelete(){
            var formData = new FormData();
            formData.append('id', this.tageId);
            axios.post('http://127.0.0.1:8000/api/deleteTage',formData)
            .then(() => {
                this.getTages();
                this.tageName = null;
                this.showConfirmModal = !this.showConfirmModal;
            });
        }
    },
}
</script>