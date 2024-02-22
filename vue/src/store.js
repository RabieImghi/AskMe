import { defineStore } from 'pinia'

export const useStore = defineStore('main', {
  state: () => ({
    role_id: 3,
    user: null,
  }),
  actions: {
    storeId(user_id) {
      this.user_id = user_id
    },
    setUser(user) { 
      this.user = user
    },
  },
})