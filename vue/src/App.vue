<template>
  <div class="myApp">
    <router-view/>
  </div>
</template>

<script>
// import axios from 'axios';
// import { useStore } from './store'
export default {
  name: 'App',
  // mounted() {
  //   this.$watch('$route', () => {
  //     const store = useStore();
  //     axios.post('http://127.0.0.1:8000/api/CheckPermission', {
  //       uri: this.$route.path,
  //       role_id: store.role_id
  //     })
  //     .then(response => {
  //       console.log(response.data.uri);
  //     }).catch(error => {
  //       if (error.response.status === 401) {
          
  //         this.$router.push('/user/Error404/');
  //       }
  //     });
  //   });
  // }
}
</script>
