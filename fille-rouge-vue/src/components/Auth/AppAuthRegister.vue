<template>
    <div class="d">
        <main>
            <div class="logo text-center">
                <img src="../../assets/img/logo3.png" alt="logo" width="300px">
            </div>
            <div class="cardForm shadow p-5 m-3 ">
                <h3 class="blueColor text-center">Create an Account</h3>
                <p class="text-center text-secondary">Enter your personal details <br> to create account</p>
                <form class="d-flex flex-column justify-content-between gap-4">
                    <label class="text-secondary"> 
                        <input type="email" name="firstname"  placeholder="First Name ..." class="form-control mt-1">
                    </label>
                    <label class="text-secondary">
                        <input type="email" name="lastname"  placeholder="Last Name ..." class="form-control mt-1">
                    </label>
                    <label class="text-secondary">
                        <input type="email" name="name"  placeholder="UsrerName ..." class="form-control mt-1">
                    </label>
                    <label class="text-secondary">
                        <input type="email" name="email"  placeholder="Your Email ..." class="form-control mt-1">
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
                        <input type="checkbox" class="form-check-input" > I agree and accept the <a  href="#" class="blueColor no-underline">terms and conditions</a> 
                    </label>
                    <button type="button" class="btn btn-primary">Create Account</button>
                    <p class="text-secondary">Already have an account? <router-link to="/user/auth"  class="blueColor no-underline"> Log in</router-link></p>
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