<template>
    <div class="sectionBadge pe-4">
        <div class="bg-white">
            <div class="border-bottom container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
            </div> 
            <section class="pt-4 h3 container-mf">
                <span class="fw-bold">Points System</span>
                <p class="text-secondary h5 pt-3">Besides gaining reputation with your questions and answers, you receive badges for being especially 
                    helpful. Badges appears on your profile page, questions & answers.</p>
                <div class="badges d-flex flex-wrap justify-content-start gap-3 align-items-center pt-4">
                    <div v-for="badge in Badges" :key='badge.id' 
                        class="badge border  p-3 rounded-2 d-flex gap-3 align-items-center" >
                        <img src="./../../assets/img/bagde.png" alt="image" width="60px">
                        <div class="points d-flex flex-column">
                            <div class="fw-bold text-secondary h4 text-start"> <span class="text-warning">{{badge.point}}</span>  Point</div>
                            <p class="text-secondary dscription h5">{{badge.description}}</p>
                        </div>
                    </div>  
                    <div  class="badge border  p-3 rounded-2 d-flex gap-3 align-items-center" >
                        <img src="./../../assets/img/bagde.png" alt="image" width="60px">
                        <div class="points d-flex flex-column">
                            <div class="fw-bold text-secondary h4 text-start"> <span class="text-warning">20</span>  Point</div>
                            <p class="text-secondary  h5">When your answer has been<br>chosen as the best answer.</p>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'AppBadge',
        data(){
            return{
                Badges:[
                    {id:1, point:20, description: "For Signing up."},
                    {id:2, point:20, description: "For adding an answer."},
                    {id:3, point:20, description: "For adding a new question." },
                    {id:4, point:20, description: "Your question gets a vote." },
                ],
            };
        }
    }
</script>
<style>
.badge{
    width: 400px;
}
</style>