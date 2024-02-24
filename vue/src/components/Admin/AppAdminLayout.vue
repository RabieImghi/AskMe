<template>
    <div>
        <header class="p-3" style="box-shadow: 0px 0px 40px rgba(211, 211, 211, 0.438);">
            <div class="p-2">
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="d-flex gap-4 align-items-center ">
                        <div class="logo cursor-pointer ">
                            <img src="../../assets/img/logo3.png" width="120px" alt="">
                        </div>
                    </div>
                    <div class="profile d-flex gap-4 align-items-center">
                        <div class="search">
                            <input type="search" name="Search" placeholder="Searche..." class="form-control" id="search">
                        </div>
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/img/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/user/auth/" @click="logout">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>
<script>
import axios from 'axios';
    export default{
        methods:{
            logout() {
                localStorage.setItem('role_id', 3);
                localStorage.removeItem('token');
                axios.get("http://127.0.0.1:8000/api/logout");
            }
            
        }
    }
</script>