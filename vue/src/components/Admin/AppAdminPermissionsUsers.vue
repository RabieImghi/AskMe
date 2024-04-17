<template>
    <div class="sectionUser ">
        <div class="headerDashboard container-mf pb-1">
            <span class="fw-bold h5 text-dark">Admin / <span class="text-secondary">Permissions</span> </span>
        </div>
        <hr>
        <div class="container-mf">
            <div class="tableSectiond">
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
                                <span class="cursor-point fw-normal mb-1 prmissions" v-for="(route, index) in routes" :key="index"
                                :class="route.isActive === 1 ? 'active' : 'inactive'"
                                @click="changeStatus(route.id, route.isActive)"
                                >{{ route.route }}</span>
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
        
    </div>
</template>
<style>
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
    .active{
        background-color: #4caf50;
        color: white;
    }
    .inactive{
        background-color: #f44336;
        color: white;
    }
</style>
<script>
import axios from 'axios';
import {useStore} from '../../store';
import Loader  from '../User/AppLoader';
import Swal from 'sweetalert2';
export default {
    name: "AppAdminPermissions",
    data() {
        return {
            permissions: [],
            isLoading: true,
            skip: 0,
            count:0,
            page:1,
            nbPage:1,
        }
    },
    mounted() {
        this.getPermissions();
    },  
    components: { Loader },
    methods: {
        getPermissions() {
            const store = new useStore();
            axios.get(`${store.URL}getRolePemissionsUsers/${this.skip}`,{
                headers: { 'Authorization': `Bearer ${store.token}` }
            })
            .then(response => {
                this.permissions = response.data.permissions;
                this.count = response.data.count;
                this.nbPage = Math.ceil(this.count / 6);
                this.isLoading = false;
            });
        },
        changeStatus(id, isActive) {
            const store = new useStore();
            var is_active = 1;
            if(isActive === 1) is_active = 0;
            let formData = new FormData();
            formData.append('id', id);
            formData.append('is_active', is_active);
            axios.post(`${store.URL}ChangeStatusPermissions`,formData,{
                headers: { 'Authorization': `Bearer ${store.token}` },
            })
            .then(() => {
                this.getPermissions();
                Swal.fire(
                    'Success',
                    'Permission status has been changed successfully',
                    'success'
                )
            }).catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            })
        },
        nextPage(){
            if(this.skip < this.count - 6){
                this.skip += 6;
                this.page += 1;
                this.getPermissions(); 
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            }
        },
        previewsPage(){
            if(this.skip >= 6){
                this.skip -= 6;
                this.page -= 1;
                this.getPermissions();
                this.$nextTick(() => {
                    document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
                });
            }
        },
        getPage(page){
            this.skip = page * 6 - 6;
            this.page = page;
            this.getPermissions();
            this.$nextTick(() => {
                document.querySelector('.sectionUser').scrollIntoView({ behavior: 'smooth' });
            });
        },
    }
}
</script>