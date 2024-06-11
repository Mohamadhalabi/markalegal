<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header height-700">
                <div class="md-layout index-form">
                    <div class="md-layout-item columnB">
                        <h1>
                            ÜCRETSİZ MARKA SORGULAMA
                            <p>Online Marka Başvurusu ve Bilgi Alma</p>
                        </h1>
                    </div>
                    <div class="md-layout-item">
                        <QueryForm class="main-form"></QueryForm>
                    </div>
                </div>
            </parallax>
            <div class="main main-raised">
                <div class="section">
                    <div class="container">
                        <h2 class="title">Nasıl Çalışır?</h2>
                        <div class="text-center">
                            <div class="md-layout">
                                <ul class="process">
                                    <li class="process__item">
                                        <span class="process__title">
                                            Markanızı Sorgulatın
                                        </span>
                                        <p class="process__subtitle">
                                            Ücretsiz marka sorgulatın. Tescil
                                            ettirmeyi düşündüğünüz markanızı
                                            sorgu formuna yazın ve sorgu sonucu
                                            için bir iletişim numarası girin.
                                        </p>
                                    </li>
                                    <li class="process__item">
                                        <span class="process__title"
                                            >Ücretsiz Bilgilenin</span
                                        >
                                        <p class="process__subtitle">
                                            Markanıza özel ücretsiz uzman görüşü
                                            için uzmanımız tarafından aranın.
                                            İster bilgi, ister teklif alın.
                                        </p>
                                    </li>
                                    <li class="process__item">
                                        <span class="process__title"
                                            >Hızlı Marka Başvurusu</span
                                        >
                                        <p class="process__subtitle">
                                            Uzman ve avukat gözetiminde marka
                                            başvurunuzu online ödeme kanalları
                                            ile hızla gerçekleştirelim. Uygun ve
                                            şeffaf ücret garantisi ile.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section-tabs">
                    <div class="container">
                        <h2 class="title">Marka Tescil Süreci</h2>
                        <client-only>
                            <nav-pills></nav-pills>
                        </client-only>
                    </div>
                </div>
                <div class="section">
                    <div class="container">
                        <h2 class="title">Marka Patent Rehberi</h2>
                        <guides></guides>
                        <div class="justify-content-center">
                            <div class="text-center tum-marka-button">
                                <client-only>
                                    <md-button
                                        class="md-rose md-lg tum-marka-button"
                                        style="display: inline-flex;"
                                        href="/marka-patent-rehberi"
                                    >
                                        TÜM MARKA PATENT REHBERLERİ
                                    </md-button>
                                </client-only>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../layout/AppLayout.vue";
import Guides from "../components/Guides.vue";
import NavPills from "../components/NavPillsSection.vue";
import QueryForm from "../components/MarkaQueryForm.vue";
import ClientOnly from "vue-client-only";
export default {
    components: {
        ClientOnly,
        AppLayout,
        Guides,
        QueryForm,
        NavPills,
    },
};
</script>
