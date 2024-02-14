<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white shadow">
            <section class="cover bg-dark row">
                <div class="profile col-2 d-flex flex-column justify-content-end">
                    <input type="file" class="d-none" id="fileinputProfil">
                    <img @click="uploadsImageProfile" class="cursor-point" src="../../assets/img/user.png" alt="image" width="140px">
                </div>
                <div class="infoProfile col p-4">
                    <input type="file" class="d-none" id="fileinput">
                    <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point">Tap Upload Your <br>
                        Cover Photo</div>
                    <div class="contai bg-white m-1 rounded-1 d-flex justify-content-between align-items-center">
                        <span class="text-secondary fw-bold mx-3">Rabie_Imghi</span>
                        <div class="buttons d-flex gap-4">
                            <button class="btn btn-dark m-1">Edit</button>
                            <button class="Enlightened m-1">Enlightened</button>
                        </div>
                    </div>
                </div>
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
        name: 'AppBadge',
        methods:{
            uploadsImageCover(){
                document.getElementById('fileinput').click();
            },
            uploadsImageProfile(){
                document.getElementById('fileinputProfil').click();

            }
        }
    }
</script>
<style>
    .row{
        width: 100%;
        margin: 0 !important;
    }
    /* .profile{
        border: white solid 5px;
        width: 150px;
        border-radius: 50%;
    } */
</style>