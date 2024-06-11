<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="md-layout-item">
                    <div class="text-center">
                        <h1 class="title">MARKA PATENT REHBERİ</h1>
                    </div>
                </div>
            </parallax>
            <div class="main main-raised">
                <br><br>
                <div class="search-bar">
                    <div class="md-layout-item md-xlarge-size-40 md-large-size-40 md-medium-size-50 md-small-size-70 md-xsmall-size-100">
                        <md-field>
                            <label>Search</label>
                            <md-input
                                v-model="keyword"
                                id="input"
                            ></md-input>
                            <md-icon
                            >search
                            </md-icon>
                        </md-field>
                    </div>
                </div>
                <br><br>
                <div :class="classs">
                    <div class="tum-marka-patent-card" v-for="guide in guides.data" :key="guide.index">
                        <a :href="`marka-patent-rehberi/${guide.slug}`">
                            <div class="card-banner">
                                <img class="banner-img"
                                     :src="`images/${guide.image}`" :alt='guide.title' width="500" height="400">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ guide.title }}</h3>
                                <p class="blog-description">{{ guide.description }}</p>
                                <div class="card-profile">
                                    <div>
                                        <h4 class="tim-typo">Yazar <span class="tim-note">marka.legal</span></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <advanced-laravel-vue-paginate :previousText="'«'" :nextText="'»'" :showNextPrev="true" :data="guides" @paginateTo="list"
                />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../layout/AppLayout.vue";
import AdvancedLaravelVuePaginate from "advanced-laravel-vue-paginate";
import axios from "axios";
export default {
    components: {
        AppLayout,AdvancedLaravelVuePaginate
    },
    data(){
        return {
            guides:{},
            search: "",
            keyword: null,
            activeClassIn:String,
            classs:''
        }
    },
    props:{
        data:[],
    },
    watch:{
        keyword(after, before) {
            this.list();
        }
    },
    methods: {
         list(page=1){
             axios.get(`/search?page=${page}`,{params: {keyword: this.keyword }})
                 .then(({data})=>{
                     this.guides = data
                     if (this.guides.data.length >= 3){
                        this.classs = 'card-wrapper';
                     }
                     else if(this.guides.data.length >=2){
                         this.classs = 'card-wrap';
                     }
                     else {
                         this.classs = 'card-wrapp';
                     }
                 }).catch(({ response })=>{
                     console.error(response)
            })
        },
    },
    mounted() {
        this.list();
    },
};
</script>
