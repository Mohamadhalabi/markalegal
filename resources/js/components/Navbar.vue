<template>
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
                            <a href="/" class="md-title brand"> marka.legal </a>
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
</template>
<script>
export default {
    methods:{
        openContactForm() {
            this.toggleNavbarMobile();
            this.classicModal = true;
        },
    }
};
</script>