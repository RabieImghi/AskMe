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
                                <button class="btn btn-dark m-1">Edit</button>
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
                <form class="mt-4">
                    <div class="d-flex align-items-center gap-2">
                        <img src="../../assets/img/information.png" width="50px" alt="info">
                        <div class="fw-bold text-secondary h3 pt-2">Basic Information</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Nickname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="RabieImghi">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Rabe">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ait Imghi">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Country <span class="text-warning">(optionel)</span></label>
                            <select name="country" id=""  class="form-control">
                                <option value="ma">Maroc</option>
                                <option value="ma">Maroc</option>
                                <option value="ma">Maroc</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Phone <span class="text-warning">(optionel)</span></label>
                            <input type="text" class="form-control" placeholder="+21263948-3932">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">E-Mail </label>
                            <input type="text" class="form-control" readonly value="rabieaitimghi@gmail.com">
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 pt-4">
                        <img src="../../assets/img/webpage.png" width="40px" alt="info">
                        <div class="fw-bold text-secondary h3 pt-2">Social Profiles </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="fw-bold h6 text-primary">Facebook (url) </label>
                            <input type="text" class="form-control" placeholder="https://example.com">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-dark">Github (url)</label>
                            <input type="text" class="form-control" placeholder="https://example.com">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-success">whatsapp (Num)</label>
                            <input type="text" class="form-control" placeholder="+21260000-0000">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-danger">Email (Email)</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="fw-bold h6 text-primary ">LinkedIn (url)</label>
                            <input type="text" class="form-control" placeholder="https://example.com">
                        </div>
                        <div class="col">
                            <label class="fw-bold h6 text-secondary">Web Site (url)</label>
                            <input type="text" class="form-control" placeholder="www.example.com">
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Save Your Info</button>
                </form>
            </section>
            <footer class="text-center text-secondary border-top mt-4 fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppProfileSetting',
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