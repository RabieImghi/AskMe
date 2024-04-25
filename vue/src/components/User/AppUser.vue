<template>
    <div>
      <AppUserLayout class="layouyUser"/>
      <div class="d-flex contentApp">
        <div class=" AppContentBody">
          <router-view></router-view> 
        </div>
        <div class="aside">
          <AppUserAside/>
        </div>
      </div>
    </div>
</template>
<script>
    import AppUserLayout from './AppLayout.vue';
    import AppUserAside from './AppAside.vue';
    export default {
        components:{
            AppUserLayout,
            AppUserAside,
        },
        mounted() {
          var Tawk_API = Tawk_API || {};
          var s1 = document.createElement("script");
          s1.async = true;
          s1.src = 'https://embed.tawk.to/646c82c974285f0ec46d177a/1h13ttpc4';
          s1.charset = 'UTF-8';
          s1.setAttribute('crossorigin', '*');
          document.head.appendChild(s1);
        }
    }
</script>
<style>
.aside{
  padding: 0 !important;
  width: 25%;
}
.AppContentBody{
  height: calc(100vh - 80px);
  overflow-y: scroll;
  width: 75%;
}
.AppContentBody::-webkit-scrollbar{
  display: none !important;
}
.contentApp{
  margin: 0 !important;
}
</style>
