<template>
    <div class="test">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Permissions</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <table class="table align-middle mb-0 bg-white ">
                <thead class="bg-light">
                    <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(routes, role) in permissions" :key="role">
                        <td>
                            <p class="fw-bold mb-1 text-start" :class="role">{{ role }}</p>
                        </td>
                        <td class="d-flex flex-wrap gap-4" >
                            <span class="cursor-point fw-normal mb-1 prmissions" v-for="(route, index) in routes" :key="index">{{ route }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
        
    </div>
</template>
<style>
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
</style>
<script>
import axios from 'axios';
export default {
    name: "AppAdminPermissions",
    data() {
        return {
            permissions: [],
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