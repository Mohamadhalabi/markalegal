import { Parallax } from "../components";
import { VPopover } from "v-tooltip";

const GlobalComponents = {
    install(Vue) {
        Vue.component(Parallax.name, Parallax);
        Vue.component("v-popover", VPopover);
    },
};

export default GlobalComponents;
