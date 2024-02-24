<template>
  <div class="myApp">
    <router-view/>
  </div>
</template>

<script>
// import axios from 'axios';
import { useStore } from './store'
export default {
  name: 'App',
  provide() {
    return {
      getPath: this.getPath
    }
  },
  methods: {
    getPath() {
      return window.location.pathname.substring(1);
    }
  },
  // created(){
  //   const store = useStore();
  //   if(store.role_id === 1){
  //       this.$router.push('/admin/');
  //   }
  //   if(store.role_id === 2){
  //       this.$router.push('/user/');
  //   }
  // }
  // watch: {
  //   '$route'() {
  //     alert(this.$store.state.permissoions);
  //     axios.get('http://127.0.0.1:8000/api/CheckPermission' ,{
  //       role_id: this.$store.state.role_id
  //     });
  //   }
  // }
}
</script>
