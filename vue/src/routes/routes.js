import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';
import {useStore} from '../store';

import AppUser from '../components/User/AppUser.vue';
import AppHome from '../components/User/componentsHome/AppHome.vue';
import AppBadge from '../components/User/componentsService/AppBadge.vue';
import AppUsers from '../components/User/componentsService/AppUsers.vue';
import AppTages from '../components/User/componentsService/AppTages.vue';
import AppContact from '../components/User/componentsService/AppContact.vue';
import AppTagePost from '../components/User/componentsService/AppTagePost.vue';


import AppProfile from '../components/User/componrntsProfile/AppProfile.vue';
import AppProfileSetting from '../components/User/componrntsProfile/AppProfileSetting.vue';
import AppMyQuistion from '../components/User/componrntsProfile/AppMyQuestion.vue';
import AppAnswers from '../components/User/componentsHome/AppAnswers.vue';
import AppAboutUs from '../components/User/componentsHome/AppAboutUs.vue';
import AppAskQuesion from '../components/User/componentsHome/AppAskQuesion.vue';
import UpdateMyQuestion from '../components/User/componrntsProfile/AppUpdateMyQuestion.vue';


import AppAdmin from '../components/Admin/AppAdmin.vue';
import AppAdminHome from '../components/Admin/AppAdminHome.vue';
import AppAdminPermissions from '../components/Admin/AppAdminPermissions.vue';
import AppAdminPermissionsUsers from '../components/Admin/AppAdminPermissionsUsers.vue';
import AppAdminTages from '../components/Admin/AppAdminTages.vue';
import AppAdminCategory  from '../components/Admin/AppAdminCategory.vue';
import ManageUsers  from '../components/Admin/AppManageUsers.vue';
import ManagePost  from '../components/Admin/AppManagePost.vue';


import AppAuth from '../components/Auth/AppAuth.vue';
import AppAuthLogin from '../components/Auth/AppAuthLogin.vue';
import AppAuthRegister from '../components/Auth/AppAuthRegister.vue';


import AppError from '../components/Error/AppError404.vue';


const routes = [
    { path: '', redirect: '/user/' },
    { 
        path: '/user',
        component: AppUser,
        children: [
            { path: '', component: AppHome },
            { path: 'home', component: AppHome },
            { path: 'Servises/Badges', component: AppBadge },
            { path: 'Servises/Users', component: AppUsers },
            { path: 'Servises/Tages', component: AppTages },
            { path: 'Servises/Posts', component: AppTagePost },
            
            { path: 'contactUs', component: AppContact },
            { path: 'profile', component: AppProfile, name:'UserProfile', props: true },
            { path: 'settings', component: AppProfileSetting },
            { path: 'myQuestion', component: AppMyQuistion },
            { path: 'Answers', component: AppAnswers, name:'userAnswers', props: true },
            { path: 'aboutUs', component: AppAboutUs },
            { path: 'AskQuesion', component: AppAskQuesion },
            { path: 'UpdateMyQuestion', component: UpdateMyQuestion, name: 'UpdateMyQuestion', props: true},
            
        ]
    },
    { 
        path: '/admin',
        component: AppAdmin,
        children: [
            { path: '', component: AppAdminHome },
            { path: 'Permissions', component: AppAdminPermissions },
            { path: 'Permissions/Users', component: AppAdminPermissionsUsers },
            { path: 'tages', component: AppAdminTages },
            { path: 'category', component: AppAdminCategory },
            { path: 'Manage/Users', component: ManageUsers },
            { path: 'Manage/post', component: ManagePost },
            
            
            
        ]
    },
    { 
        path: '/user/auth',
        component: AppAuth,
        children: [
            { path: '', component: AppAuthLogin },
            { path: 'register', component: AppAuthRegister },
        ]
    },
    { 
        path: '/user/Error404',
        component: AppError,
        children: [
            { path: '', component: AppError },
        ]
    },
    
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


function extractURIs(routes, parentPath = '') {
    const URIs = [];
    routes.forEach(route => { 
        const fullPath = parentPath + route.path; 
        if (route.children) {
            URIs.push(fullPath);
            URIs.push(...extractURIs(route.children, fullPath + '/'));   
        } else {
            URIs.push(fullPath);
        }
    });
    return URIs;
}
const routerURIs = extractURIs(routes);

axios.post(`http://127.0.0.1:8000/api/PermissionVueJs`, {router: routerURIs});

// router.beforeEach((to, from, next) => {
//     const store = useStore();
//     axios.post(store.URL+'CheckPermission', {
//       uri: to.path,
//       role_id: store.role_id
//     })
//     .then(response => {
//         console.log(response.data);
//         next()
//         return;
//     }).catch(error => {
//       if (error.response.status === 401) {
//         next()
//         return;
//       }
//     });
// });

router.beforeEach((to, from, next) => {
    const store = useStore();
    var data=[];
    if(store.user_id){
        data = {
            user_id: store.user_id,
            role_id: store.role_id,
            uri: to.path
        }
    }else{
        data = {
            user_id: null,
            role_id: store.role_id,
            uri: to.path
        }
    }
    axios.post(`${store.URL}CheckPermissionUser`,{
        dataUser: data
    })
    .then(response => {
        if(response.data=='Auth' || to.path === '/user/Error404/'){
            next();
            return;
        } else {
            router.push('/user/Error404/');
        }
    }).catch(error => {
        console.log(error.response);
    });
});

















// if(store.PermissionsUser != null){
//     console.log(store.PermissionsUser)
// }else{
//     console.log('null')

// }

// router.beforeEach(async (to, from, next) => {
//     const store = useStore();
//     if(store.user_id != null){
//       const permissions = await import('@/Cache/PermissionsUser.js');
//       for (let i = 0; i < permissions.route.length; i++) {
//         if (to.path == permissions.route[i] && permissions.isActive[i] == 1) {
//           next();
//           return;
//         }
//       }
//     }
//     next();
//   });

  
export default router;
