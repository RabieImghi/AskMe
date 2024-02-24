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
    import { useStore } from '../../store'
    export default {
        components:{
            AppUserLayout,
            AppUserAside,
        },
        mounted(){
            const store = useStore();
            if(store.role_id == 1){
              this.$router.push('/admin/');
            }
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
