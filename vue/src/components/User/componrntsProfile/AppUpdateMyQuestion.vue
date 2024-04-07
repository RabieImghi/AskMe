<template>
    <div class="sectionHome pe-4">
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom  container-mf pt-4 pb-4">
                <span class="fw-bold text-secondary">Home /  Questions / <span class="text-secondary-500"> Ask A Question</span></span>  
            </div> 
           <section class="border-bottom pt-3 pb-3 mb-4">
                <div class="container-mf">
                    <form class="mt-4">
                        <div class="row">
                            <div class="col">
                                <label class="fw-bold h5 text-secondary">Question Title <span class="text-danger">*</span></label>
                                <div class="row mobilAskStyle">
                                    <div class="img col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="mt-2 bi bi-patch-question" viewBox="0 0 16 16">
                                            <path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745"/>
                                            <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0"/>
                                        </svg>
                                    </div>
                                    <div class="input col pt-1">
                                        <input v-model="title" type="text" class="form-control mb-2" placeholder="Type Question Title ...">
                                        <span class="text-secondary">Please choose an appropriate title for the question so it can be answered easily.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col pt-2">
                                <label class="fw-bold h5 text-secondary">Category <span class="text-danger">*</span></label>
                                <div class="row mobilAskStyle">
                                    <div class="img col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="mt-2 bi bi-bookmark" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="input col pt-1">
                                        <select name="category" class="form-select mb-2" v-model="category" id="">
                                            <option value="" selected disabled>Choose Category</option>
                                            <option v-for="categorys in categoryList" :key="categorys.id" :value="categorys.id" >{{ categorys.name }}</option>
                                        </select>
                                        <span class="text-secondary">Please choose the appropriate section so the question can be searched easily.</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col pt-2">
                                <label class="fw-bold h5 text-secondary">Tags  <span class="text-danger">*</span></label>
                                <div class="row mobilAskStyle">
                                    <div class="img col-1">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="mt-2 bi bi-tags" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="input col pt-1">
                                        <select id="tags" class="" multiple v-model="selectedItems">
                                            <option v-for="tag in tags" :key="tag.id" :value="tag.id">{{ tag.text }}</option>
                                        </select>
                                        <span class="text-secondary">Please choose suitable Keywords.</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col pt-2">
                                <label class="fw-bold h5 text-secondary">Details  <span class="text-danger">*</span></label>
                                <div class="row mobilAskStyle">
                                    <div class="img col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="mt-2 bi bi-ticket-detailed" viewBox="0 0 16 16">
                                            <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2z"/>
                                            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z"/>
                                        </svg>
                                    </div>
                                    <div class="input col pt-1">
                                        <textarea name="description" id="mytextarea" class="mb-2" placeholder="Type the description thoroughly and in details."></textarea>
                                        <span class="text-secondary">Type the description thoroughly and in details.    </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row pt-4 border-bottom pb-3">
                            <div class="col pt-2">
                                <label class="fw-bold h5 text-secondary">File <span class="text-warning h6">(optionel)</span></label>
                                <div class="row mobilAskStyle">
                                    <div class="img col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="mt-2 bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
                                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                        </svg>
                                    </div>
                                    <div class="input col pt-1">
                                        <input type="file" @change="onFileChange" class="form-control mb-2" accept="png,jpg,jpeg,jpf" name="" id="">
                                        <span class="text-secondary">Please upload your file accepted file: png, jpf, jpeg.    </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-3 align-items-center">
                            <button type="reset" class="btn btn-secondary mt-3">Reste</button>
                            <button type="button" @click="submitForm" class="btn btn-primary mt-3">Update Question</button>
                        </div>
                    
                    </form>
                </div>
           </section>
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
    </div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css';
import { useStore } from '@/store';
 /* global tinymce */
    export default{
        name: 'AppAskQuesion',
        props:['id','titlePoste', 'tages_id', 'category_id', 'content'],
        data(){
            return{
                title: this.titlePoste,
                category: this.category_id,
                selected: this.tages_id,
                selectedItems: this.tages_id,
                file: null,
                tags: [],
                categoryList: [],
                
            }
            
        },
        mounted(){
            let store = useStore();
            this.$nextTick(() => {
                tinymce.init({
                    selector: '#mytextarea',
                    setup: (editor) => {
                        editor.on('init', () => {
                            editor.setContent(this.content);
                        });
                    }
                });
            });
            axios.get(`${store.URL}getAllTagesCategory`)
            .then(response => {
                this.tags = response.data.Tages;
                this.categoryList = response.data.Categorys;
                this.initTomSelect();
            });
        },
        methods:{
            initTomSelect() {
                new TomSelect("#tags", {
                options: this.tags.map(tag => ({ value: tag.id, text: tag.text })),
                items: this.selectedItems
                });
            },
            onFileChange(e) {
                this.file = e.target.files[0];
            },
            async submitForm(){
                let store = useStore();
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('category', this.category);
                formData.append('tages', this.selectedItems);
                formData.append('description', tinymce.get('mytextarea').getContent());
                formData.append('image', this.file);
                formData.append('id', this.id);
                let response = await axios.post(`${store.URL}UpdateQuestions`, formData,{
                    headers: {'Authorization': `Bearer ${store.token}` }
                });
                if(response.status == 200){
                    Swal.fire(
                        'Success',
                        'Post updated successfully',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        'There was an error update your question. Please try again.',
                        'error'
                    );
                }
            },
        }
    }
</script>
<style>
</style>