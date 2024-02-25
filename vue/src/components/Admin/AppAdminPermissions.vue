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
            <table class="">
                <thead >
                    <tr class="itemsPermission">
                        <th>Role</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(routes, role) in permissions" :key="role" class="itemsPermission">
                        <td>
                            <p class="fw-bold mb-1 text-start" :class="role">{{ role }}</p>
                        </td>
                        <td class="d-flex flex-wrap gap-4" >
                            <span class="cursor-point fw-normal mb-1 prmissions" v-for="(route, index) in routes" :key="index">
                                {{ route }}
                            </span>
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
                            <select name="role_id" class="form-select">
                                <option value="1">User</option>
                                <option value="1">Admin</option>
                                <option value="1">Guest</option>
                            </select>
                        </div>
                        <div>
                            <label class="fw-bold h6 text-secondary">Permissions</label>
                            <select name="role_id" class="form-select">
                                <option value="1">User</option>
                                <option value="1">Admin</option>
                                <option value="1">Guest</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
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
</style>
<script>
import axios from 'axios';
export default {
    name: "AppAdminPermissions",
    data() {
        return {
            permissions: [],
            showModal: true
        }
    },
    mounted() {
        this.getPermissions();
    },  
    methods: {
        getPermissions() {
            axios.get('http://127.0.0.1:8000/api/getRolePemissions')
            .then(response => {
                this.permissions = response.data.permissions;
                console.log(this.permissions);
            }).catch(error => {
                console.log(error);
            })
        },
    },
}
</script>