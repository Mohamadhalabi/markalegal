<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="col-12 text-center">
                    <h1 class="title">Marka Tescili Nasıl Yapılır?</h1>
                </div>
            </parallax>
            <div class="main main-raised guide">
                <div class="section">
                    <div class="container">
                        <section class="content">
                            <p>
                                Marka tescili Türk Patent ve Marka Kurumu
                                tarafından yapılmaktadır. Fiziki evrak veya
                                online olarak başvuru yapılabilir. Başvuru
                                yapıldıktan sonra kurumdaki uzmanlar markayı
                                detaylı şekilde inceler ve kriterlere göre
                                değerlendirir. Bu kriterler genel olarak kamu
                                ahlakına uygun olması, dini değerler içermemesi,
                                tanınmış bir markanın aynısı veya benzeri
                                olmaması, ayırt edici olması gibidir. Bu
                                kriterler uygun olması durumunda marka resmi
                                bültende 2 ay süreyle yayınlanır. Bu süre
                                içerisinde itiraz olmaması ve eksik belge
                                kalmaması durumunda markanız onaylanır. Tescil
                                edildikten sonra yenilenmediği takdirde tescil
                                süresi 10 yıldır ve Türkiye sınırları içerisinde
                                geçerlidir.
                            </p>
                            <p>
                                Marka tescili kişi veya işletmeler tarafından
                                Türk Patent ve Marka Kurumu nezdinde
                                yapılabilir. Bir markanın tescil edilme
                                sürecinde alanında uzman marka vekillerinden
                                destek alınması, hem süreç içerisinde
                                karşılaşılabilecek durumların öngörülmesi ve
                                sürecin pürüzsüz ilerlemesi hem de takibinin
                                eksiksiz yapılması açısından önem arz eder.
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
