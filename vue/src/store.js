import { defineStore } from 'pinia'
// import axios from 'axios';

export const useStore = defineStore('main', {
  state: () => ({
    role_id: localStorage.getItem('role_id') || 3,
    user: localStorage.getItem('user') || null,
    token: localStorage.getItem('token') || null,
    permissions : {
      
    }
  }),
  actions: {
    storeRole_id(role_id) {
      this.role_id = role_id;
      localStorage.setItem('role_id', role_id)
    },
    setUser(user) { 
      this.user = user;
      localStorage.setItem('user', user)
    },
    setToken(token) {
      this.token = token;
      localStorage.setItem('token', token)
    },
  },
})