import { createRouter, createWebHistory } from 'vue-router';
import AppHome from '../components/componentsHome/AppHome.vue';
import AppBadge from '../components/componentsService/AppBadge.vue';
import AppUsers from '../components/componentsService/AppUsers.vue';
import AppTages from '../components/componentsService/AppTages.vue';
import AppContact from '../components/componentsService/AppContact.vue';
import AppProfile from '../components/componrntsProfile/AppProfile.vue';
import AppProfileSetting from '../components/componrntsProfile/AppProfileSetting.vue';
import AppMyQuistion from '../components/componrntsProfile/AppMyQuestion.vue';
import AppAnswers from '../components/componentsHome/AppAnswers.vue';
import AppAboutUs from '../components/componentsHome/AppAboutUs.vue';
import AppAskQuesion from '../components/componentsHome/AppAskQuesion.vue';

const routes = [
    {name: 'Home', path: '/', component: AppHome},
    {name: 'Servises/Badges', path: '/Servises/Badges', component: AppBadge},
    {name: 'Servises/Users', path: '/Servises/Users', component: AppUsers},
    {name: 'Servises/Tages', path: '/Servises/Tages', component: AppTages},
    {name: '/ContactUs', path: '/ContactUs', component: AppContact},
    {name: '/Profile', path: '/Profile', component: AppProfile},
    {name: '/Settings', path: '/Settings', component: AppProfileSetting},
    {name: '/MyQuistion', path: '/MyQuistion', component: AppMyQuistion},
    {name: '/Answers', path: '/Answers', component: AppAnswers},
    {name: '/AboutUs', path: '/AboutUs', component: AppAboutUs},
    {name: '/AskQuesion', path: '/AskQuesion', component: AppAskQuesion},
    
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;