<template>
    <div class="wrapper">
        <guide-component @guides="GetGuides"/>
        <div class="md-layout" id="marka-patent-rehberi">
            <guide-card
                class="md-layout-item md-size-50 md-xsmall-size-90"
                v-for="guide in guides"
                :key="guide.index"
                :guide="guide"
            ></guide-card>
        </div>
    </div>
</template>

<script>
import GuideCard from "../components/GuideCard.vue";
import GuideComponent from "../components/GuideComponent";

export default {
    components: {
        GuideCard,
        GuideComponent
    },
    data() {
        return {
            guides: [],
        };
    },
    methods: {
        GetGuides(event){
            this.guides = event;
        }
    }
};
</script>
