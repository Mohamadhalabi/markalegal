<template>
    <div>
        <modal v-if="this.response.isActive" @close="classicModalHide">
            <template slot="header">
                <h4 class="modal-title">{{ this.response.title }}</h4>
                <md-button
                    class="md-simple md-just-icon md-round modal-default-button"
                    @click="classicModalHide"
                >
                    <md-icon>clear</md-icon>
                </md-button>
            </template>

            <template slot="body">
                <p v-html="this.response.body"></p>
            </template>

            <template slot="footer">
                <md-button class="md-danger" @click="classicModalHide"
                    >Kapat</md-button
                >
            </template>
        </modal>
    </div>
</template>
<script>
const Modal = () => import("../components/Modal.vue");
export default {
    props: ["response"],
    components: {
        Modal,
    },
    methods: {
        classicModalHide() {
            this.response.isActive = false;
        },
    },
};
</script>
