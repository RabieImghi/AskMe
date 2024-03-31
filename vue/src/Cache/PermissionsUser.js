// import axios from 'axios';
// import { useStore } from '@/store';
// const store = useStore();

// let PermissionsUser = localStorage.getItem('permissionsUser') || false;
// let data = [];
// if(store.PermissionsUser != null) {
//     data = JSON.parse(PermissionsUser);
//     console.log('from cache');
// } else {
//     axios.post('http://127.0.0.1:8000/api/CheckPermissionUser')
//     .then(response => {
//         localStorage.setItem('permissionsUser', JSON.stringify(response.data.permissionsUser));
//         data = response.data.permissionsUser;
//         console.log('from server');
//     }).catch(error => {
//         console.log(error.response);
//     });
// }
// export default data['tt'];