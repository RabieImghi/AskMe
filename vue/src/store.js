import { defineStore } from 'pinia'
// import axios from 'axios';

export const useStore = defineStore('main', {
  state: () => ({
    URL: 'http://127.0.0.1:8000/api/',
    role_id: localStorage.getItem('role_id') || 3,
    user_id: localStorage.getItem('user_id') || null,
    user: localStorage.getItem('user') || null,
    badge: localStorage.getItem('badge') || null,
    token: localStorage.getItem('token') || null,
    imageUser: localStorage.getItem('imageUser') || null,
    coverImage: localStorage.getItem('coverImage') || null,
    post_id: localStorage.getItem('post_id') || null,
    userProfileId : localStorage.getItem('userProfileId') || null,
    tageId : localStorage.getItem('tageId') || null,
    
  }),
  actions: {
    storeRole_id(role_id) {
      this.role_id = role_id;
      localStorage.setItem('role_id', role_id)
    },
    storeUser_id(user_id) {
      this.user_id = user_id;
      localStorage.setItem('user_id', user_id)
    },
    setUser(user) { 
      this.user = user;
      localStorage.setItem('user', user)
    },
    setBadge(badge) { 
      this.badge = badge;
      localStorage.setItem('badge', badge)
    },
    setToken(token) {
      this.token = token;
      localStorage.setItem('token', token)
    },
    setPermissionsUser(permissionsUser) {
      localStorage.setItem('permissionsUser', permissionsUser)
      this.PermissionsUser = permissionsUser
    },
    setPost_id(post_id) {
      this.post_id = post_id;
      localStorage.setItem('post_id', post_id)
    },
    setImageUser(imageUser) {
      this.imageUser = imageUser;
      localStorage.setItem('imageUser', imageUser)
    },
    setCoverImage(coverImage) {
      this.coverImage = coverImage;
      localStorage.setItem('coverImage', coverImage)
    },
    setuserProfileId(userId){
      localStorage.setItem('userProfileId', userId)
      this.userProfileId = userId;
    },
    setTageId(tageId){
      localStorage.setItem('tageId', tageId)
      this.tageId = tageId;

    }

    
  },
})