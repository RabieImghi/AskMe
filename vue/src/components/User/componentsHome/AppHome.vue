<template>
    <div class="sectionHome pe-4">
        <section v-if="!tokenExists" class="container-mf p-4 checkAuth d-flex justify-content-between align-items-center" style="background: #121419;">
            <div class="infoText d-flex flex-column gap-3">
                <span class="h1 fw-bold" style="color: #AEAEAE;">Share & grow the world's knowledge!</span>
                <p class="text-secondary">We want to connect the people who have knowledge to the people who need it, to bring 
                together people with different perspectives so they can understand each other better,
                and to empower everyone to share their knowledge.</p>
                <router-link to='auth/' class="btn btn-primary w-50">Create A New Account</router-link>
            </div>
            <img src="../../../assets/img/auth.png" id="imageAuth" width="40%" class="p-3" alt="Image">
        </section>
        <section class="QuestionSection shadow pt-4  py-4 ">
            
            <AppDisplayQuestion/>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
    </div>
</template>
<script>
    import AppDisplayQuestion from './/AppDisplayQuestion.vue';
    import { useStore } from '../../../store';
    export default{
        inject: ['getPath'],
        name: 'AppHome',
        components: {
            AppDisplayQuestion,
        },
        computed: {
            tokenExists() {
                const store = useStore();
                return store.token;
            },
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