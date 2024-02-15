<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white shadow">
            <section class="cover" >
                <div class="coverInfo row p-3">
                    <div class="profile col-2 d-flex flex-column justify-content-end">
                        <input type="file" class="d-none" id="fileinputProfil">
                        <img @click="uploadsImageProfile" class="cursor-point imageProfil" src="../../assets/img/user.png" alt="image" width="140px">
                    </div>
                    <div class="infoProfile col p-4">
                        <input type="file" class="d-none" id="fileinput">
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white-md text-end cursor-point">Tap Upload Your <br>
                            Cover Photo</div>
                        <div class="containName infoProfileHiden  m-1 rounded-1 d-flex justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">Rabie_Imghi</btn>
                            <div class="buttons d-flex gap-4 ">
                                <router-link to='/Settings'> <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button class="Enlightened m-1">Enlightened</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <div class="border-bottom container-mf pt-4 pb-4 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> RabieImghi</span></span>  
                <button class="btn btn-light shadow fw-bold text-secondary">Show All Your Question</button>
            </div> 
            
            <section class="container-mf mt-4 pt-2">
                <AppDisplayQuestion/>
            </section>
            <footer class="text-center text-secondary border-top mt-4 fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    import AppDisplayQuestion from '../componentsHome/AppDisplayQuestion.vue';
    export default{
        name: 'AppBadge',
        methods:{
            uploadsImageCover(){
                document.getElementById('fileinput').click();
            },
            uploadsImageProfile(){
                document.getElementById('fileinputProfil').click();

            }
        },
        components:{
            AppDisplayQuestion,
        }
    }
</script>
<style>
    .row{
        width: 100%;
        margin: 0 !important;
    }
    .coverInfo{
        background: rgba(0, 0, 0, 0.476);
    }
    .containName{
        background: rgba(255, 255, 255, 0.341);
    }
    .cover{
        background-image: url("../../assets/img/cover.jpg");
    }
    .imageProfil{
        border: 6px solid white;
        border-radius: 50%;
    }
    .statique{
        width: 180px;
    }
   .linksosial{
    width: 340px;
   }
</style>