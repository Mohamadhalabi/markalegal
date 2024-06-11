<template>
    <AppLayout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="container">
                    <div class="col-12 text-center">
                        <h1 class="title">Hakkımızda</h1>
                    </div>
                </div>
            </parallax>

            <div class="main main-raised">
                <div class="section">
                    <div class="container">
                        <section class="content">
                            <p>
                                <strong>Marka Legal</strong>, marka
                                danışmanları, marka vekilleri ve avukatlardan
                                oluşan Türkiye’de fikri ve sınai mülkiyet
                                alanında çalışan uzman bir ekiptir.<br />
                                Marka Legal, markanızı oluşturma fikri kafanızda
                                oluşmasından itibaren marka başvuru ve marka
                                sorgulama süreçlerinin en başından en sonuna
                                kadar alabileceğiniz en iyi danışmanlığı en
                                uygun fiyata kitlelere ulaştırmak için bir araya
                                gelen danışmanlar tarafından kurulmuştur.<br />
                                Marka hukuku ve marka uygulamaları konusunda
                                uzun yıllar boyu tecrübeli uzman Marka Legal
                                ekibi, markayı bir fikri ve sınai mülkiyet hakkı
                                olarak bütünsel bir yaklaşımla ele alır ve fikri
                                haklarınızı en iyi şekilde korumanız için size
                                danışmanlık ve vekillik hizmeti sağlar.<br />
                                Gerek ulusal gerek uluslararası arenada marka
                                ile ilgili ihtiyaçlarınızı sektördeki uzun bilgi
                                birikimi ile karşılayan Marka Legal, markanızın
                                sizin kapsamlı çabalarınızın bir karşılığı
                                olduğu anlar ve bu sebeple ihtiyaçlarınıza
                                yönelik kaliteli danışmanlığı en uygun ücretle
                                size ulaştırma vizyonu ile hizmet
                                vermektedir.<br />
                            </p>
                            <p><strong>Email:</strong> info@marka.legal</p>
                            <p><strong>Telefon:</strong> +90 212 7061467</p>
                            <a :href="this.images.about.src"
                                ><img
                                    :load="this.images.about.load"
                                    :src="this.images.about.src"
                                    :alt="this.images.about.alt"
                            /></a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../layout/AppLayout";

export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            images: {
                about: {
                    src: require("../../assets/img/Hakkımızda.webp"),
                    alt: "Proust Patent",
                    load: "lazy",
                },
            },
        };
    },
};
</script>
