<template>
    <div class="sectionHome pe-4">
        <section class="container-mf p-4 checkAuth d-flex justify-content-between align-items-center" style="background: #121419;">
            <div class="infoText d-flex flex-column gap-3">
                <span class="h1 fw-bold" style="color: #AEAEAE;">Share & grow the world's knowledge!</span>
                <p class="text-secondary">We want to connect the people who have knowledge to the people who need it, to bring 
                together people with different perspectives so they can understand each other better,
                and to empower everyone to share their knowledge.</p>
                <router-link to='/SignUp' class="btn btn-primary w-50">Create A New Account</router-link>
            </div>
            <img src="../../assets/img/auth.png" id="imageAuth" width="40%" class="p-3" alt="Image">
        </section>
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom pb-4">
                <div class="filtrBar container-mf d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="filter d-flex justify-content-between align-items-center gap-2">
                        <select name="" id="" class="form-select shadow-sm">
                            <option value="null" selected disabled>Filtr_By</option>
                            <option value="1">Must read Question</option>
                            <option value="1">Must read Question 1</option>
                            <option value="1">Must read Question 11</option>
                        </select>
                    </div>
                    <div class="search d-flex justify-content-betweent align-items-center gap-2">
                        <select name="" id="" style="width: 150px;" class=" form-select shadow-sm">
                            <option value="1" selected disabled>Type_Search</option>
                            <option value="question">Title</option>
                            <option value="tages">Tages</option>
                        </select>
                        <input type="search" style="max-width: 250px;" class="shadow-sm form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
            <AppDisplayQuestion/>
            <div class="border-bottom pb-4  pagination container-mf d-flex pt-4 justify-content-end">
                <ul class="nav">
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">&lt;</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">1</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold border mx-2 btn-primary btn">2</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">3</li>
                    <li class="pt-2 curs_point pb-2 px-3 pe-3 fw-bold text-secondary border mx-2">&gt;</li>
                </ul>
            </div>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
    </div>
</template>
<script>
    import AppDisplayQuestion from './/AppDisplayQuestion.vue';
    export default{
        name: 'AppHome',
        components: {
            AppDisplayQuestion,
        },
    }
</script>
<style>
    .checkAuth{
        box-shadow: 0px -6px 10px lightgray;
    }
    .QuestionSection{
        background: white;
    }
    .statistiqueQuistion{
        background: #FDFEF9;
    }
</style>