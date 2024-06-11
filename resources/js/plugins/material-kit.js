import VueMaterial from "vue-material";
import globalDirectives from "./globalDirectives";
import globalMixins from "./globalMixins";
import globalComponents from "./globalComponents";
import VueLazyload from "vue-lazyload";
import VueCarousel from "vue-carousel";

export default {
    install(Vue) {
        Vue.use(VueMaterial);
        Vue.use(globalDirectives);
        Vue.use(globalMixins);
        Vue.use(globalComponents);
        Vue.use(VueCarousel);
        Vue.use(VueLazyload, {
            observer: true,
            observerOptions: {
                rootMargin: "0px",
                threshold: 0.1,
            },
        });
    },
};
