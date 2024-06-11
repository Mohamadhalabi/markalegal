<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="col-12 text-center">
                    <h1 class="title">Marka Sorgulanması Nasıl Yapılır?</h1>
                </div>
            </parallax>
            <div class="main main-raised guide">
                <div class="section">
                    <div class="container">
                        <section class="content">
                            <p>
                                Marka Sorgulanması, marka tescil süreci
                                gerçekleşmeden yapılması gereken kontrol
                                işlemidir. Marka ismi ve şekline karar verirken
                                markanın tescillenmesi için aynı veya benzer
                                markaların olup olmadığının, hangi sınıfta
                                alınacak ise o sınıfa uygun olup olmadığının ve
                                genel kriterlere uygunluğunun araştırılması
                                gereklidir. Aksi takdirde marka tescil sürecinde
                                bunlar markanın onaylanmasını engeller. Genel
                                sorgulama Türk Patent ve Marka Kurumu'nun sitesi
                                üzerinden yapılır. Sorgulama ekranında genel
                                veya daha özel veriler girilerek detaylı
                                sorgulanma yapılabilir.
                            </p>
                            <p>
                                Marka Sorgulanması, marka tescil süreci
                                gerçekleşmeden yapılması gereken kontrol
                                işlemidir. Marka ismi ve şekline karar verirken
                                markanın tescillenmesi için aynı veya benzer
                                markaların olup olmadığının, hangi sınıfta
                                alınacak ise o sınıfa uygun olup olmadığının ve
                                genel kriterlere uygunluğunun araştırılması
                                gereklidir. Aksi takdirde marka tescil sürecinde
                                bunlar markanın onaylanmasını engeller. Genel
                                sorgulama Türk Patent ve Marka Kurumu'nun sitesi
                                üzerinden yapılabilir. Sorgulama ekranında genel
                                veya daha özel veriler girilerek detaylı
                                sorgulanma yapılabilir. Bu araştırmalar
                                sırasında marka vekilleri ve uzmanları
                                tarafından destek alınması sonuçların
                                yorumlanması, süreçlerin öngörülmesi ve
                                araştırmaların sağlığı açısından önemlidir.
                            </p>
                        </section>
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
import AppLayout from "../../layout/AppLayout";
import QueryBar from "../../components/QueryBar";
import ClientOnly from "vue-client-only";
export default {
    components: {
        AppLayout,
        QueryBar,
        ClientOnly
    },
};
</script>
