<template>
    <div class="contentPage pe-4">
        <div class="bg-white shadow">
            <div class="border-bottom container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> Badges</span></span>  
            </div> 
            <section class="pt-4 h3 container-mf">
                <span class="fw-bold">Points System</span>
                <p class="text-secondary h5 pt-3">Besides gaining reputation with your questions and answers, you receive badges for being especially 
                    helpful. Badges appears on your profile page, questions & answers.</p>
                <div class="badges d-flex flex-wrap justify-content-start gap-3 align-items-center pt-4">
                    <div v-for="badge in Badges" :key='badge.id' style="min-height:123px" 
                        class="badge translateEffect cursor-point border  p-3 rounded-2 d-flex gap-3 align-items-center" >
                        <img src="../../../assets/img/bagde.png" alt="image" width="60px">
                        <div class="points d-flex flex-column">
                            <div class="fw-bold text-secondary h4 text-start"> <span class="text-warning">{{badge.point}}</span>  Point</div>
                            <p class="text-secondary dscription h5">{{badge.description}}</p>
                        </div>
                    </div>  
                    <div  class="badge border translateEffect cursor-point  p-3 rounded-2 d-flex gap-3 align-items-center" >
                        <img src="../../../assets/img/bagde.png" alt="image" width="60px">
                        <div class="points d-flex flex-column">
                            <div class="fw-bold text-secondary h4 text-start"> <span class="text-warning">20</span>  Point</div>
                            <p class="text-secondary  h5">When your answer has been<br>chosen as the best answer.</p>
                        </div>
                    </div>  
                </div>
            </section>
            <section class="pt-4 h3 border-bottom pb-4 container-mf">
                <p class="fw-bold h3">Badges System</p>
                <p class="text-secondary h5 pt-3">Besides gaining reputation with your questions and answers, you receive badges for being especially helpful. 
                    Badges appears on your profile page, questions & answers.</p>
                <div class="badgesPonit">
                    <div v-for="BadgesLevel in BadgesLevels" :key="BadgesLevel.id" class="badgeLevel mt-3 border d-flex ">
                        <div class="infobadgeLevel  p-2">
                            <button  :class="BadgesLevel.class">{{ BadgesLevel.level }}</button>
                            <div  class="badg pt-3 d-flex gap-3 align-items-center" >
                                <img src="../../../assets/img/bagde.png" alt="image" width="40px">
                                <div class="fw-bold text-secondary h5 text-start"> <span class="text-warning">{{BadgesLevel.point}}</span>_Point</div>
                            </div>  
                        </div>
                        <div class="m-0 p-2 text-secondary d-flex flex-column justify-content-start border-left  h5">
                           {{ BadgesLevel.description }}
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
        data(){
            return{
                h5: 'h5',
                Badges:[
                    {id:1, point:20, description: "For Signing up."},
                    {id:2, point:15, description: "For adding an answer."},
                    {id:3, point:30, description: "For adding a new question." },
                    {id:4, point:10, description: "Your question gets a vote." },
                    {id:4, point:25, description: "Your Answer gets a vote." },
                ],
                BadgesLevels:[
                    {id:1, class: 'Beginner h6', point:10, level: 'Beginner', description: "You must have a total score of 50 in at least 10 non-community wiki answers to achieve this badge. Highest scoring answer that outscored an accepted answer with score of more than 10."},
                    {id:2, class: 'Explainer h6', point:50, level: 'Explainer', description: "You must have a total score of 100 in at least 50 non-community wiki answers to achieve this badge. Highest scoring answer that outscored an accepted answer with score of more than 50."},
                    {id:3, class: 'Enlightened h6', point:100 ,level: 'Enlightened', description: "You must have a total score of 150 in at least 100 non-community wiki answers to achieve this badge. Highest scoring answer that outscored an accepted answer with score of more than 100." },
                    {id:4, class: 'Professional h6', point:150 ,level: 'Professional', description: "You must have a total score of 200 in at least 150 non-community wiki answers to  achieve this badge. Highest scoring answer that outscored an accepted answer with score of more than 150." },
                ],
            };
        }
    }
</script>
<style>
.badge{
    width: 400px;
}
.border-left {
    border-left: 1px solid lightgray;
}
</style>