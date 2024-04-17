<template>
    <div class="sectionBadge padding-none  pe-4">
        <div class="bg-white shadow">
            <section class="cover" :style="{
                    backgroundImage: `url(${coverImage})`,
                    backgroundSize: 'cover',
                }">
                <div class="coverInfo row p-3">
                    <div class="infoProfile col pt-4 pe-4">
                        <input type="file" class="d-none" @change="changeImage('Cover')" id="fileinputCover" />
                        <div @click="uploadsImageCover" class="fw-bold h1 text-white text-end cursor-point">
                            Tap Upload Your <br />
                            Cover Photo
                        </div>
                        <div
                            class="containName infoProfileHiden m-1 rounded-1 d-flex justify-content-between align-items-center">
                            <btn class="btn btn-dark p-1 h4 mt-2 fw-bold mx-3">Home / Profile / Settings</btn>
                            <div class="buttons d-flex gap-4">
                                <router-link to="/user/myQuestion"> 
                                    <button class="btn btn-dark m-1"> My Question </button>
                                </router-link>
                                <router-link to="/user/settings">
                                    <button class="btn btn-dark m-1">Edit</button></router-link>
                                <button :class="user.badge" class="m-1">
                                    {{ user.badge }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-body text-center">
                                <input type="file" @change="changeImage('Profil')" class="d-none" id="fileinputProfil">
                                <img  @click="uploadsImageProfile" class="img-account-profile rounded-circle mb-2"
                                :src="avatar" alt="" width="250" />
                                <div class="small font-italic text-muted mb-4">
                                    JPG or PNG no larger than 5 MB
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will
                                            appear to other users on the
                                            site)</label>
                                        <input class="form-control" id="inputUsername" type="text"
                                            placeholder="Enter your username"  v-model="user.name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" type="text"
                                            placeholder="Enter your first name" v-model="user.firstName" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" type="text"
                                            placeholder="Enter your last name"  v-model="user.lastName" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputOrgName">Phone</label>
                                        <input class="form-control" id="inputOrgName" type="text"
                                            placeholder="Enter your organization name" v-model="user.phone" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputLocation">Country</label>
                                        <select name="country" id="" v-model="user.country" class="form-control">
                                            <option v-for="country in countries" :key="country.common" :value="country.name.common">
                                                {{ country.name.common }}
                                            </option>
                                        </select>
                                    </div>
                                        
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">About</label>
                                        <textarea name="" class="form-control" id="" v-model="user.about" cols="30" rows="6"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="card-header d-flex justify-content-between">
                                Donnations Details
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="small mb-1" >Coindrop Link</label>
                                        <input class="form-control mb-3" type="text" placeholder="https://coindrop.to/Exemple" 
                                        v-model="user.donnationLink"
                                        />
                                        <span class="pt-3">If you don't have Coindrop
                                            <a href="https://coindrop.to" class="text-danger" target="_blank">click here to create Account</a> 
                                        </span>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="card-header">Social Link Details</div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Website</label>
                                        <input class="form-control" id="inputUsername" type="text"
                                            placeholder="Enter your username" v-model="user.WebSite" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputFirstName">Github</label>
                                        <input class="form-control" id="inputFirstName" type="text"
                                            placeholder="Enter your first name" v-model="user.Github" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputLastName">Twitter</label>
                                        <input class="form-control" id="inputLastName" type="text"
                                            placeholder="Enter your last name" v-model="user.twitter" />
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputOrgName">Instagram</label>
                                        <input class="form-control" id="inputOrgName" type="text"
                                            placeholder="Enter your organization name" v-model="user.instagram" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputLocation">Facebook</label>
                                        <input class="form-control" id="inputLocation" type="text"
                                            placeholder="Enter your location" v-model="user.facebook" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputLocation">LinkedIn</label>
                                        <input class="form-control" id="inputLocation" type="text"
                                            placeholder="Enter your location" v-model="user.linkedin" />
                                    </div>
                                    <button class="btn btn-primary" @click="submitForm" type="button">
                                        Save changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center text-secondary border-top mt-4 fw-bold pt-3">
                © Copyright AskMe. All Rights Reserved <br />
                Designed by Rabie Ait Imghi
            </footer>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { useStore } from "../../../store";
import Swal from "sweetalert2";
export default {
    name: "AppProfileSetting",
    data() {
        const store = useStore();
        return {
            store,
            user: [],
            countries: [],
        };
    },
    computed: {
        userName() {
            return this.store.user;
        },
        userBadge() {
            return this.store.badge;
        },
        avatar() {
            return this.store.imageUser;
        },
        userId() {
            return this.store.user_id;
        },
        coverImage() {
            return this.store.coverImage;
        },
    },
    mounted() {
        this.getUserInfo();
    },
    created() {
        axios.get("https://restcountries.com/v3.1/all")
            .then((response) => {
                this.countries = response.data.sort((a, b) =>
                    a.name.common.localeCompare(b.name.common)
                );
            })
            .catch((error) => console.error("Error:", error));
    },
    methods: {
        uploadsImageCover() {
            document.getElementById("fileinput").click();
        },
        uploadsImageProfile() {
            document.getElementById("fileinputProfil").click();
        },
        async changeImage(type) {
            const store = useStore();
            const file = document.getElementById(`fileinput${type}`).files[0];
            if (file.length === 0) {
                console.log("No file selected");
                return;
            }
            const reader = new FileReader();
            reader.readAsDataURL(file);
            const formData = new FormData();
            formData.append("image", file);
            formData.append("type", type);
            formData.append("id", this.userId);
            const response = await axios.post(`${store.URL}uploadImage`,formData,{
                    headers: { Authorization: `Bearer ${store.token}` },
                }
            );
            if (type == "Profil") {
                reader.onload = (e) => {
                    this.store.imageUser = e.target.result;
                };
                this.store.setImageUser(response.data.image);
            } else {
                reader.onload = (e) => {
                    this.store.coverImage = e.target.result;
                };
                this.store.setCoverImage(response.data.image);
            }
        },
        async getUserInfo() {
            const store = useStore();
            var followerId =null;
            if(this.store.user_id != null){
                followerId = this.store.user_id;
            }
            let response = await axios.get(`${store.URL}getUserInfo/${this.userId}/${followerId}`);
            this.user = response.data.user;
            console.log(this.user);
        },
        async submitForm() {
            let store = useStore();
            let response = await axios.post(
                `${store.URL}updateUserInfo`,
                this.user,
                {
                    headers: { Authorization: `Bearer ${store.token}` },
                }
            );
            if (response.data.message) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "User info updated successfully!",
                    showConfirmButton: false,
                    timer: 1000,
                });
            }
        },
    },
};
</script>
<style>
.row {
    width: 100%;
    margin: 0 !important;
}

.coverInfo {
    background: rgba(0, 0, 0, 0.476);
}

.containName {
    background: rgba(255, 255, 255, 0.341);
}

.imageProfil {
    border: 6px solid white;
    border-radius: 50%;
}

.statique {
    width: 180px;
}

.linksosial {
    width: 340px;
}
</style>