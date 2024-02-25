<template>
    <div class="contentPage pe-4">
        <div class="bg-white contactpage shadow">
            <div class="border-bottom container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Contact</span></span>  
            </div> 
            <section class="contact container-mf border-bottom pb-4 pt-4  ">
                <div class="title d-flex align-items-center gap-3">
                    <img src="../../../assets/img/contactus.png" width="35px" alt="image">
                    <span class="fw-bold h4">Contact Us</span>
                </div>
                <p class="text-secondary h5 mt-3">We understand the importance of approaching each work integrally and believe in the power of simple and 
                    easy communication. Feel free to contact us for any questions or if you need any help or services ! Please 
                    provide a detailed explanation of your problem.
                </p>
                <form class="mt-4">
                    <div class="row">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Name</label>
                            <input type="text" class="form-control" placeholder="Type Your Name ...">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Email</label>
                            <input type="email" class="form-control" placeholder="Type Your Email ...">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Phone</label>
                            <input type="text" class="form-control" placeholder="Type Your Phone...">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Subject</label>
                            <input type="email" class="form-control" placeholder="Type Your Subject...">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Message</label>
                            <textarea  class="form-control" rows="10" placeholder="Type Your Message..."></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Send Your Message</button>
                </form>
            </section>
            <footer class="text-center text-secondary fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'appContact',
    }
</script>
<style>
    .contactpage{
        min-height: calc( 100vh - 80px ) !important;
    }
    input::-webkit-input-placeholder {
        color: rgb(124, 124, 124) !important;
        font-size: 1em !important;
        font-family: sans-serif;
    }
</style>