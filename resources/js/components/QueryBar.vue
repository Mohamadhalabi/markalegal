<template>
    <div class="queryBar">
        <div class="queryBar-logo">
            <a href="https://marka.legal">marka.legal</a>
        </div>
        <div class="queryBar-content">
            Online marka başvurusu ve bilgi alma. Üstelik tamamen
            <b>ücretsiz.</b> Ücretsiz Marka Sorgula!
        </div>
        <div class="queryBar-right">
            <md-button class="btn-bar md-sm" @click="classicModal = true"
                >HEMEN MARKA SORGULA !</md-button
            >
        </div>
        <modal v-if="classicModal" id="modal" @close="classicModalHide">
            <template slot="header">
                <h2 class="modal-title">Marka Sorgulama</h2>
                <md-button
                    class="md-simple md-just-icon md-round modal-default-button"
                    @click="classicModalHide"
                >
                    <md-icon>clear</md-icon>
                </md-button>
            </template>
            <template slot="body">
                <query-form
                    class="queryForm"
                    @formValidation="queryFormValidation($event)"
                ></query-form>
            </template>
        </modal>
    </div>
</template>

<script>
const Modal = () => import("./Modal");
const queryForm = () => import("./MarkaQueryForm");
export default {
    components: {
        Modal,
        queryForm,
    },
    data() {
        return {
            queryButtonVisible: false,
            classicModal: false,
        };
    },
    methods: {
        classicModalHide() {
            this.classicModal = false;
        },
        queryFormValidation(event) {
            this.classicModal = !event;
        },
    },
};
</script>
