import { defineStore } from 'pinia'
// import axios from 'axios';

export const useStore = defineStore('main', {
  state: () => ({
    role_id: localStorage.getItem('role_id') || 3,
    user: localStorage.getItem('user') || null,
    token: localStorage.getItem('token') || null,
  }),
  actions: {
    storeId(user_id) {
      this.user_id = user_id;
      localStorage.setItem('user_id', user_id)
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