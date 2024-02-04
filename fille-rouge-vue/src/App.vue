<template>
  <AppLayout title="CRUD"/>
  <router-view></router-view>
</template>

<script>
import AppLayout from './components/AppLayout.vue'
export default {
  name: 'App',
  components: {
    AppLayout
  }
}
</script>

<style>

</style>
