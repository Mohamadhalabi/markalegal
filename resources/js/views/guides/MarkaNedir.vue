<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="md-layout-item">
                    <div class="text-center">
                        <h1 class="title">Marka Nedir?</h1>
                    </div>
                </div>
            </parallax>
            <div class="main main-raised guide">
                <div class="section">
                    <div class="container">
                        <section class="content">
                            <p>
                                Marka, bir işletmenin hizmet veya ürünlerini
                                diğer ürünlerden ayıran, seçici hale getiren
                                belirleyici işaretlerdir. Bu işaretler türlü
                                şekillerde sözcük, şekil, renk, harf, sayı, ses,
                                hareket, koku veya ambalajdan oluşabilir. Marka,
                                işletmenin ve ürün veya hizmetlerinin
                                ilerleyebilmesi, sürekliliğini sağlayabilmesi
                                için gerekli temel unsurlardan biridir.
                            </p>
                            <p>
                                Markanın bir işletme için sağlayacağı faydalar
                                vardır:
                            </p>
                            <ul class="text-left content-list">
                                <li>
                                    Üretilen ürünün veya verilen hizmetin kim
                                    veya kimler tarafından sağlandığının
                                    tescilidir.
                                </li>
                                <li>
                                    Başka kişilerin sizi taklit etmesinin, sizin
                                    markanızı kullanarak fayda sağlamasının
                                    önündeki en önemli hukuksal güvencedir.
                                </li>
                                <li>
                                    Ürünler ve hizmetler devamlı olarak görünür
                                    olmayabilir, modası geçebilir fakat marka
                                    her zaman kalıcıdır bu yüzden markanın
                                    verdiği hizmet veya ürün değişse bile
                                    bilinir olduğu için insanların tercih sebebi
                                    olacaktır, bu sebeple marka sonu olmayan bir
                                    reklamdır.
                                </li>
                                <li>
                                    Marka firmanın değeridir, bilinirlik,
                                    prestij ve saygınlıktır. İnsanlar bilinmeyen
                                    yerine marka olan ürünleri tercih ederler,
                                    bu yüzden marka tüketicinin seçimidir.
                                </li>
                                <li>
                                    Marka, insanların duygu ve düşünceleri ile
                                    etkileşimdedir. Hepimizin marka dendiğinde
                                    aklına gelen çağrışımlar vardır ve marka bu
                                    sebeple bağlayıcıdır. Öyle ki marka
                                    fanatikleri olduğunu bile görebilmekteyiz.
                                </li>
                            </ul>
                            <p>
                                Bütün bu sebeplerden dolayı üretici ya da hizmet
                                sağlayıcı firmalar ürünü ile ilgili marka
                                oluşturmayı ve bunu tescil ettirmeyi tercih
                                etmektedirler.
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
