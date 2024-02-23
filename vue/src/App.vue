<template>
  <div class="myApp">
    <router-view/>
  </div>
</template>

<script>
// import axios from 'axios';
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
  // watch: {
  //   '$route'() {
  //     alert(this.$store.state.permissoions);
  //     axios.get('http://127.0.0.1:8000/api/CheckPermission' ,{
  //       path:  this.getPath(),
  //       role_id: this.$store.state.role_id
  //     });
  //   }
  // }
}
</script>
