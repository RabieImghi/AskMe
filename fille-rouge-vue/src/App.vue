<template>
  <div class="myApp">
    <AppLayout/>
    <div class="d-flex contentApp">
      <div class=" AppContentBody">
        <router-view></router-view> 
      </div>
      <div class="aside">
        <AppAside/>
      </div>
    </div>
  </div>
</template>

<script>
import AppLayout from './components/AppLayout.vue'
import AppAside from './components/AppAside.vue'
export default {
  name: 'App',
  components: {
    AppLayout,
    AppAside,
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
