<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="md-layout-item">
                    <div class="col-12 text-center">
                        <h1 class="title">{{ guide.title }}</h1>
                    </div>
                </div>
            </parallax>
            <div class="main main-raised guide pb-20">
                <div class="section">
                    <div class="container">
                        <div class=" guide-page-search md-layout-item md-xlarge-size-40 md-large-size-40 md-medium-size-50 md-small-size-70 md-xsmall-size-80"
                             v-if="guide.title == 'Nice Sınıfı Listesi'">

                            <md-field>
                                <label>Search</label>
                                <md-input
                                    v-model="keyword"
                                    ></md-input>
                                <md-icon
                                >search
                                </md-icon>
                            </md-field>
                        </div>
                        <div v-if="guide.title == 'Nice Sınıfı Listesi'">
                           <p style="font-size: 18px;padding:15px;line-height: 30px">Markalar Nis Anlaşmasında belirlenen uluslararası sınıflandırmaya ilişkin esaslara göre sınıflara ayrılmıştır ve tescil edilirken bu sınıflara göre ayrılarak tescil edilirler. Markanın kullanılacağı ürün ve hizmetler toplam 45 farklı sınıfa bölünmüştür. İlk 34 sınıf üretim malları son 11 sınıf ise hizmet ürünlerini kapsar. Marka sınıflarının kapsamlı listesi aşağıda verilmiştir.

                            Marka sınıfları içinde arama yapmak için aşağıdaki arama çubuğunu kullanabilirsiniz.
                           </p>
                            <div v-for="guid in guides" :key="guid.id">
                                <section class="content content-table md-layout-item md-xlarge-size-100 md-large-size-100 md-medium-size-50 md-small-size-70 md-xsmall-size-80" style="align-items: center">
                                <table class="styled-table">
                                    <thead>
                                    <tr>
                                        <th v-html="guid.sinif"></th>
                                    </tr>
                                    </thead>
                                    <tbody v-html="guid.content">
                                    </tbody>
                                </table>
                            </section>
                            </div>
                        </div>
                        <div v-else>
                        <section class="content" v-html="guide.content">
                        </section>
                        </div>
                    </div>
                </div>
                <client-only>
                    <query-bar></query-bar>
                </client-only>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../layout/AppLayout";
import QueryBar from "../components/QueryBar";
import ClientOnly from "vue-client-only";
import axios from "axios";
export default {
    components: {
        AppLayout,
        QueryBar,
        ClientOnly
    },
    data(){
        return {
            search: '',
            guides: {},
            keyword:null,
        }
    },
    watch:{
        keyword(after, before) {
            this.list();
        }
    },
    computed: {
    guide() {
      return this.$page.props.data.guide
    },
    },
    methods:{
        list(page=1){
            axios.get(`/nice-class`,{params: {keyword: this.keyword }})
                .then(({data})=>{
                    this.guides = data
                    console.log(this.guides = data);
                }).catch(({ response })=>{
                console.error(response)
            })
        },
    },
    mounted() {
        this.list();
    }
};
</script>
<style>
.styled-table {
    border-collapse: collapse;
    /*margin: 25px 0;*/
    font-size: 18px;
    font-family: sans-serif;
    min-width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    font-family: "Cabin", "Geneva", "Verdana", "sans-serif";
}
.styled-table thead tr {
    background-image: linear-gradient(to right top, #3c456d, #353d5f, #2e3552, #272e45, #212638);
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table th{
    text-align: center;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    /*border-bottom: 2px solid #009879;*/
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    background-image: linear-gradient(to right top, #3c456d, #353d5f, #2e3552, #272e45, #212638);
}

</style>
