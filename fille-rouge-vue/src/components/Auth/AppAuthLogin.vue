<template>
    <div class="d-flex justify-content-center align-items-center">
        <main>
            <div class="logo text-center">
                <img src="../../assets/img/logo3.png" alt="logo" width="300px">
            </div>
            <div class="cardForm shadow p-5 m-3 ">
                <h3 class="blueColor text-center">Login to Your Account</h3>
                <p class="text-center text-secondary">Enter your email & password to login</p>
                <form action="" class="d-flex flex-column justify-content-between gap-4">
                    <label class="text-secondary">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email ..">
                            <div class="input-group-append cursor-point">
                                <span class="input-group-text"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </label>
                    <label class="text-secondary">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <div class="input-group-append cursor-point">
                                <span class="input-group-text" @click="togleInputPassword()"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </label>
                    <label class="text-secondary">
                        <input type="checkbox" class="form-check-input"> Remember me
                    </label>
                    <button type="button" class="btn btn-primary">Login</button>
                    <p class="text-secondary">Don't have account? <router-link to="/user/auth/register"  class="blueColor no-underline"> Create an account</router-link></p>
                </form>
            </div>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </main>
    </div>
</template>
<script>
    export default{
        name: 'AppAuthLogin',
        methods: {
            togleInputPassword(){
                let input = document.getElementById('password');
                let svg = document.querySelector('svg');
                if(input.type === 'password'){
                    input.type = 'text';
                    svg.style.fill = 'blue';
                }else{
                    input.type = 'password';
                    svg.style.fill = 'currentColor';
                }
            }
        }
    }
</script>