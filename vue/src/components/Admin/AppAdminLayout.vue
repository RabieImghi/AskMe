<template>
    <div>
        <header class="p-3" style="box-shadow: 0px 0px 40px rgba(211, 211, 211, 0.438);">
            <div class="p-2">
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="d-flex gap-4 align-items-center ">
                        <div class="logo cursor-pointer ">
                            <img src="../../assets/img/logo3.png" width="120px" alt="">
                        </div>
                        <div class="toggleButton" @click="toggleAside">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </div>
                    </div>
                    <div class="profile d-flex gap-4 align-items-center">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img :src="avatar" alt="mdo" width="40" height="40" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li>
                                    <router-link  class="dropdown-item" to="/user/">Home Page</router-link>
                                </li>
                                <li>
                                    <router-link  class="dropdown-item" to='/user/settings'>Settings</router-link>
                                </li>
                                <li>
                                    <router-link  class="dropdown-item" to="/user/myQuestion">My Question</router-link>
                                </li>
                                <li>
                                    <router-link :to="{ name: 'UserProfile', params: { idUser: userId } }"  
                                    class="dropdown-item"> Profile</router-link>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="/user/" @click="logout" class="dropdown-item nav-link p-2 d-flex gap-2 align-items-center cursor-point">
                                        <span class="px-2">Logout</span> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="overllayCard" id="overllayCard" @click="toggleAside"></div>
    </div>
</template>
<script>
import axios from 'axios';
import { useStore } from '@/store';
    export default{
        data(){
            const store = useStore();
            return{
                avatar: store.imageUser,
                userId: store.user_id,
            }
        },
        methods:{
            logout() {
                const store = useStore();
                localStorage.clear();
                axios.get(`${store.URL}logout`);
            },
            toggleAside(){
                const aside = document.getElementById('asideBar');
                const overllayCard = document.getElementById('overllayCard');
                aside.classList.toggle('d-block');
                overllayCard.classList.toggle('d-block');
            }
            
        }
    }
</script>
<style>

.toggleButton{
    display: none;
}
.overllayCard{
    background: rgba(0, 0, 0, 0.195);
    position: fixed;
    top: 80px;
    height: calc(100vh - 80px);
    width: 100%;
    display: none;
}
@media screen and (max-width: 1250px) {
    header{
    z-index: 1000000000000 !important; 
    }
    .toggleButton{
        display: block;
        font-size: 20px;
        cursor: pointer;
    }

    
}
</style>