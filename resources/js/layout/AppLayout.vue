<template>
    <div>
        <div id="material-kit">
            <div id="mobile-menu">
                <md-toolbar
                    id="toolbar"
                    md-elevation="0"
                    class="md-transparent md-absolute"
                    :class="extraNavClasses"
                    :color-on-scroll="colorOnScroll"
                >
                    <div class="md-toolbar-row md-collapse-lateral">
                        <div class="md-toolbar-section-start">
                            <a href="/">
                                <img
                                    class="main-logo"
                                    alt="Marka Legal Logo"
                                    :src="isDefaultImage
                                ? this.images.whiteLogo.src
                                : this.images.blackLogo.src"
                                    height="202"
                                    width="516"
                                />
                            </a>
                        </div>
                        <div class="md-toolbar-section-end">
                            <md-button
                                aria-label="Menü"
                                class="md-just-icon md-simple md-toolbar-toggle"
                                :class="{ toggled: toggledClass }"
                                @click="toggleNavbarMobile()"
                            >
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </md-button>
                            <div class="md-collapse">
                                <div class="md-collapse-wrapper">
                                    <md-list style="">
                                        <md-list-item href="/">
                                            <p class="menu-item">Anasayfa</p>
                                        </md-list-item>
                                        <md-list-item
                                            href="/kurumsal/hakkimizda"
                                        >
                                            <p class="menu-item">Hakkımızda</p>
                                        </md-list-item>
                                        <md-list-item
                                            href="/marka-patent-rehberi"
                                        >
                                            <p class="menu-item">
                                                Marka Patent Rehberi
                                            </p>
                                        </md-list-item>
                                        <md-list-item
                                            href="#"
                                            @click="openContactForm"
                                        >
                                            <p class="menu-item">İletişim</p>
                                        </md-list-item>
                                    </md-list>
                                </div>
                            </div>
                        </div>
                    </div>
                </md-toolbar>
            </div>
            <modal
                v-if="classicModal"
                id="modal"
                class="contactModal"
                @close="classicModalHide"
            >
                <template slot="header">
                    <span class="md-title modal-title">İletişim Formu</span>
                    <md-button class="md-simple md-just-icon md-round modal-default-button" @click="classicModalHide">
                        <md-icon>clear</md-icon>
                    </md-button>
                </template>
                <template slot="body">
                    <form class="row" @submit.prevent="sendMessage">
                        <div class="col-md-12">
                            <div
                                class="md-layout-item md-size-100 md-xsmall-size-100 md-small-size-100 md-medium-size-100"
                            >
                                <md-field :class="{ 'md-error':this.validationError.name
                                        }">
                                    <label>Adınız</label>
                                    <md-input
                                        v-model="name"
                                        type="text"
                                    ></md-input>
                                    <md-icon></md-icon>
                                </md-field>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div
                                class="md-layout-item md-size-100 md-xsmall-size-100 md-small-size-100 md-medium-size-100"
                            >
                                <md-field :class="{ 'md-error':this.validationError.email}">
                                    <label>Email Adresiniz</label>
                                    <md-input
                                        v-model="email"
                                        type="email"
                                    ></md-input>
                                    <md-icon></md-icon>
                                </md-field>
                            </div>
                        </div>
                        <md-field :class="{ 'md-error':this.validationError.type}">
                            <md-select
                                v-model="type"

                            >
                                <md-option value="ip_request"
                                >IP Sorgulama</md-option
                                >
                                <md-option value="feedback"
                                >Geri Bildirim</md-option
                                >
                                <md-option value="general_contact"
                                >İletişim</md-option
                                >
                            </md-select>
                        </md-field>
                        <md-field  :class="{ 'md-error':this.validationError.message}" style="background-color: transparent!important">
                            <label>Mesajınız</label>
                            <md-textarea
                                v-model="message"
                                md-autogrow
                                style="height: 120px!important"
                            ></md-textarea>
                        </md-field>
                    </form>
                    <p
                        v-if="
                            this.validationError.name ||
                            this.validationError.email ||
                            this.validationError.type ||
                            this.validationError.message
                        "
                        style="color: red"
                    >
                        Lütfen eksik kısımları tamamlayınız.
                    </p>
                </template>
                <template slot="footer">
                    <md-button
                        type="button"
                        class="md-primary FormButton"
                        @click.prevent="FormValidation"
                    >Mesaj Gönder</md-button
                    >
                </template>
            </modal>
            <main>
                <slot />
            </main>
            <footer
                class="footer"
                :data-background-color="backgroundColor"
            >
                <div class="container">
                    <nav>
                        <ul>
                            <li>
                                <a href="/kurumsal/hakkimizda"> HAKKIMIZDA </a>
                            </li>
                            <li>
                                <a href="/kurumsal/gizlilik-politikasi">
                                    GİZLİLİK POLİTİKASI
                                </a>
                            </li>
                            <li>
                                <a href="/kurumsal/kvkk-aydinlatma-metni">
                                    KVKK AYDINLATMA METNİ
                                </a>
                            </li>
                            <li>
                                <a href="/kurumsal/bilgi-guvenligi-politikasi">
                                    BİLGİ GÜVENLİĞİ METNİ
                                </a>
                            </li>
                            <li>
                                <a href="/kurumsal/bilgi-guvenligi-politikasi">
                                    GİZLİLİK BİLDİRİMİ
                                </a>
                            </li>
                            <li>
                                <a href="/kurumsal/mesafeli-satis-sozlesmesi">
                                    MESAFELİ SATIŞ SÖZLEŞMESİ
                                </a>
                            </li>
                            <li>
                                <a href="/kurumsal/teslimat-ve-iade-politikasi">
                                    TESLİMAT VE İADE İLKELERİ
                                </a>
                            </li>
                            <br />
                            <li class="image">
                                <img
                                    class="footer-logo"
                                    :loading="this.images.logo.load"
                                    :src="this.images.logo.src"
                                    :alt="this.images.logo.alt"
                                    width="429"
                                    height="32"
                                />
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>

            <modal v-if="queryModal" id="modal" @close="queryModalHide">
                <template slot="header">
                    <span class="md-title modal-title">Marka Sorgulama</span>
                    <md-button class="md-simple md-just-icon md-round modal-default-button" @click="queryModalHide">
                        <md-icon>clear</md-icon>
                    </md-button>
                </template>
                <template slot="body">
                    <query-form
                        class="queryForm"
                        @formValidation="queryFormValidation($event)"
                        :isModal="true"
                    ></query-form>
                </template>
            </modal>

            <!-- Response Modal -->
            <modal v-if="this.response.isActive" @close="responseModalHide">
                <template slot="header">
                    <h4 class="modal-title">
                        {{ this.response.title }}
                    </h4>
                    <md-button
                        class="md-simple md-just-icon md-round modal-default-button"
                        @click="responseModalHide"
                    >
                        <md-icon>clear</md-icon>
                    </md-button>
                </template>

                <template slot="body">
                    <p v-html="this.response.body"></p>
                </template>

                <template slot="footer">
                    <md-button class="md-danger" @click="responseModalHide"
                    >Kapat</md-button
                    >
                </template>
            </modal>

            <a href="https://wa.link/vdur6q" target="_blank"

               class="md-danger sticky-query-button mr-auto whatsapp"
               v-if="queryButtonVisible"
            >
                <img
                    class="whatsapp-logo"
                    :loading="this.images.whatsapp.load"
                    :src="this.images.whatsapp.src"
                    :alt="this.images.whatsapp.alt"
                    title="whatsapp"
                />
            </a
            >

            <a href="tel:+90 507 199 64 94" target="_blank"

               class="md-danger sticky-query-button mr-auto telephone"
               v-if="queryButtonVisible"
            >
                <img
                    class="whatsapp-logo"
                    :loading="this.images.whatsapp.load"
                    :src="this.images.telephone.src"
                    :alt="this.images.whatsapp.alt"
                    title="telefon"
                />
            </a
            >
            <md-button

                class="md-danger sticky-query-button mr-auto"
                @click="queryModal = true"
                v-if="queryButtonVisible"
            >
                Hemen Marka Sorgula!

            </md-button
            >

        </div>
    </div>
</template>
<script>
let resizeTimeout;
function resizeThrottler(actualResizeHandler) {
    if (!resizeTimeout) {
        resizeTimeout = setTimeout(() => {
            resizeTimeout = null;
            actualResizeHandler();
        }, 66);
    }
}
import Modal from "../components/Modal.vue";
import queryForm from "../components/MarkaQueryForm.vue";
export default {
    components: {
        Modal,
        queryForm,
    },
    data() {
        return {
            images: {
                whiteLogo : {
                    src: require("../assets/img/white.png"),
                    alt: "Logo",
                    load: "lazy",
                    country: null,
                },
                blackLogo: {
                    src: require("../assets/img/black.png"),
                    alt: "Logo",
                    load: "lazy",
                    country: null,
                },
                logo: {
                    src: require("../assets/img/logo_band_colored.png"),
                    alt: "Logo",
                    load: "lazy",
                    country: null,
                },
                whatsapp: {
                    src: require("../assets/img/whatsapp-logo.png"),
                    alt: "whatsapp-logo",
                    load: "lazy",
                },
                telephone: {
                    src: require("../assets/img/telephone.png"),
                    alt:"telephone-logo",
                    load: "lazy",
                }

            },
            colorOnScroll: 1,
            country: null,
            backgroundColor: "black",
            queryButtonVisible: false,
            classicModal: false,
            showNavbar: false,
            queryModal: false,
            errors: null,
            extraNavClasses: "",
            toggledClass: false,
            isDefaultImage: true,
            name: "",
            email: "",
            type: "ip_request",
            message: "",
            queryButtonVisibleProp:
            this.$page.props.data.queryButtonVisibleProp,
            validationError: {
                name: false,
                email: false,
                message: false,
                type: false,
            },
            response: {
                isActive: false,
                title: "",
                body: "",
            },
        };
    },
    methods: {
        errorResponse() {
            this.response.isActive = true;
            this.response.title = "Hata";
            this.response.body =
                "Bir hata oluştu, lütfen daha sonra tekrar deneyin..";
        },
        successResponse(name) {
            this.response.isActive = true;
            this.response.title = "Başarılı";
            this.response.body = `Sayın <strong>${name}</strong>,Mesajınız alınmıştır. Geri dönüş talebiniz olması halinde en kısa zamanda sağladığınız iletişim bilgisi üzerinden geri dönüş yapılacaktır. Mesajınız için teşekkür ederiz. Saygılarımızla, <strong>Marka Legal Ekibi</strong>.`;
        },
        FormValidation() {
            this.validationError.name = this.name === "";
            this.validationError.email = this.email === "";
            this.validationError.message = this.message === "";
            this.validationError.type = this.type === "";
            if (
                this.validationError.name === false &&
                this.validationError.email === false &&
                this.validationError.message === false &&
                this.validationError.type === false
            ) {
                this.sendMessage();
            }
        },
        sendMessage() {
            axios
                .post("/contact/store", {
                    name: this.name,
                    email: this.email,
                    type: this.type,
                    message: this.message,
                    form_type: "contact",
                })
                .then((res) => {
                    if (res.data.status === "success")
                        this.successResponse(this.name);
                    else this.errorResponse();
                })
                .catch((error) => {
                    this.errorResponse();
                });
        },
        bodyClick() {
            let bodyClick = document.getElementById("bodyClick");
            if (bodyClick === null) {
                let body = document.querySelector("body");
                let elem = document.createElement("div");
                elem.setAttribute("id", "bodyClick");
                body.appendChild(elem);

                let bodyClick = document.getElementById("bodyClick");
                bodyClick.addEventListener("click", this.toggleNavbarMobile);
            } else bodyClick.remove();
        },
        toggleNavbarMobile() {
            const mobileMenu = document.getElementById("mobile-menu");
            mobileMenu.classList.toggle("nav-open");
            this.showNavbar = !this.showNavbar;
            this.toggledClass = !this.toggledClass;
            this.bodyClick();
        },
        openContactForm() {
            this.toggleNavbarMobile();
            this.classicModal = true;
        },
        classicModalHide() {
            this.classicModal = false;
        },
        queryModalHide() {
            this.queryModal = false;
        },
        queryFormValidation(event) {
            this.queryModal = !event;
        },
        responseModalHide() {
            this.response.isActive = false;
        },
        handleScroll() {
            let documentHeight = document.body.clientHeight;
            let scrollValue =
                document.body.scrollTop || document.documentElement.scrollTop;
            let navbarColor = document.getElementById("toolbar");
            this.currentScrollValue = scrollValue;
            if (this.colorOnScroll > 0 && scrollValue > this.colorOnScroll) {
                this.extraNavClasses = `md-white`;
                this.isDefaultImage = false
                navbarColor.classList.remove("md-transparent");
                if (document.body.clientWidth < 1024) {
                    if (scrollValue == documentHeight - window.innerHeight) {
                        this.queryButtonVisible = false;
                    } else {
                        if (this.queryButtonVisibleProp != false)
                            this.queryButtonVisible = true;
                    }
                } else {
                    if (this.queryButtonVisibleProp != false)
                        this.queryButtonVisible = true;
                }
            } else {
                this.isDefaultImage = true
                if (this.extraNavClasses) {
                    this.extraNavClasses = "";
                    navbarColor.classList.add("md-transparent");
                }
                if (this.queryButtonVisible) {
                    this.queryButtonVisible = false;
                }
            }
        },
        scrollListener() {
            resizeThrottler(this.handleScroll);
        },
    },
    mounted() {
        document.addEventListener("scroll", this.scrollListener);
    },
    beforeDestroy() {
        document.removeEventListener("scroll", this.scrollListener);
    },
};
</script>
