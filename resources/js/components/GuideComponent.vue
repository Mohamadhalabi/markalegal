<template>
</template>
<script>
import axios from 'axios'
export default {
    name: "GuideComponent.vue",
    data() {
        return {
            guides: null
        };
    },
    mounted() {
        this.getGuides();
    },
    methods:{
        getGuides(){
            axios.get('/guides').then(response => {
                this.guides = response.data.data;
                this.$emit('guides',this.guides);
            });
        }
    }

}
</script>

