<template>
    <div class="wrapper">
        <div id="navigation-pills">
            <div class="md-layout md-alignment-center-center">
                <div class="md-layout-item md-size-50 md-small-size-100">
                    <tabs
                        :tab-name="['SORGU', 'BAŞVURU', 'TESCİL']"
                        :tab-icon="[
                            'find_in_page',
                            'schedule_send',
                            'fact_check',
                        ]"
                        plain
                        nav-pills-icons
                        color-button="primary"
                    >
                        <!-- tab-content -->
                        <template slot="tab-pane-1">
                            <div class="title">
                                <h2><small>Marka Sorgulaması</small></h2>
                            </div>
                            <p class="marka-tescil-sureci">
                            Markanızın tescili için süreç, markanın sorgulanması
                            ile başlar. Sorgu aşamasında markanızın daha önce
                            başka biri tarafından tescil edilip edilmediği
                            araştırılır. Bu araştırmalar markanızı
                            kullanacağınız şekil ve alanlara yönelik olarak
                            yapılır.
                            <br /><br />
                            Eğer markanızın daha önce başkaları tarafından
                            alanınız için tescil edildiği tespit edilirse
                            markanız tescil edilmez. Bu sebeple, sorgu
                            aşamasında deneyimli bir marka danışmanı ile
                            çalışmanız markanızın tescil edilme olasılığını
                            arttırır. Bu sayede hem marka sorgusu sonuçlarının
                            doğru yorumlanması sağlanır hem de tescil sürecinde
                            oluşabilecek sorunların öngörülebilmesi sağlıklı bir
                            tescil süreci geçirmenize yardımcı olur. Eğer marka
                            danışmanınız markanızın daha önce başkaları
                            tarafından sizin alanınızda tescil edildiğini tespit
                            ederse tescil için başvuru yapmayı düşündüğünüz
                            markayı değiştirmenizi önerebilir.
                            </p>
                        </template>
                        <template slot="tab-pane-2">
                            <div class="title">
                                <h2><small>Marka Tescil Başvurusu</small></h2>
                            </div>
                            <p class="marka-tescil-sureci">
                            Marka sorgu sürecinin tamamlanmasının ardından
                            başvuru sürecine geçilir. Marka tescil başvuruları
                            Türkpatent nezdinde yapılır. Başvuru eksiksiz ve
                            usülüne uygun yapıldıysa, başvuru ödemeleri
                            gerçekleştirildikten sonra Türkpatent başvuruyu
                            değerlendirmeye başlar.
                            <br /><br />
                            Başvurunun, hem markanızı koruyacak hem de tescil
                            almanızı kolaylaştıracak şekilde yapılması önem arz
                            etmektedir.
                            </p>
                        </template>
                        <template slot="tab-pane-3">
                            <div class="title">
                                <h2><small>Marka Tescili</small></h2>
                            </div>
                            <p class="marka-tescil-sureci">
                            Başvurunuzun ardından Türkpatent, marka başvurunuzun
                            değerlendirilmesi için başvurunuza bir uzman atar ve
                            başvurunuz değerlendirilmeye alınmış olur. Marka
                            başvurunuz hakkında araştırma başlar. Bu
                            araştırmada, markanın daha önce başka biri
                            tarafından tescil edilip edilmediği de dahil olmak
                            üzere markayı tescil etmenize engel bir durum olup
                            olmadığı resmi olarak incelenir.

                            <br /><br />
                            Marka tescili süreci zaman alabilen bir süreçtir.
                            Başvurunuz, red veya tescil kararı ile
                            sonuçlanabilir. Eğer tescil kararı ile sonuçlanırsa,
                            tescil harçlarının yatırılmasının ardından markanız
                            tescil edilir.
                            </p>
                        </template>
                    </tabs>
                </div>
                <div
                    class="md-layout-item md-size-20 md-small-size-40 md-xsmall-size-100 text-center"
                >
                    <md-button
                        class="md-rose md-lg"
                        href="/marka-basvurusu-talebi"
                        >BAŞVURU ÜCRETLERİ</md-button
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Tabs from "./Tabs.vue";

export default {
    components: {
        Tabs,
    },
};
</script>
