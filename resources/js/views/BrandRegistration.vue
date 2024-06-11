<template>
    <AppLayout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="container">
                    <div class="text-center">
                        <h1 class="title">Marka Başvurusu Talebi</h1>
                    </div>
                </div>
            </parallax>
            <div class="main main-raised">
                <div class="section">
                    <div class="container">
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-xlarge-size-70 md-large-size-50 md-medium-size-50 md-small-size-80 md-xsmall-size-100">
                                <client-only>
                                    <order-form
                                        @markaName="GetBrandName"
                                        @counter="GetClassCounter"
                                        @contactName="GetContactName"
                                        @contactMail="GetContactMail"
                                        @contactPhone="GetContactPhone"
                                        @buyerName="GetBuyerName"
                                        @tc="GetTc"
                                        @buyerEmail="GetBuyerEmail"
                                        @buyerTelephone="GetBuyerTelephone"
                                        @address="GetBuyerAddress"
                                        @buyerTitle="GetBuyerTitle"
                                        @vergiNo="GetVergiNo"
                                        :BrandMessage="this.brandMessage"
                                        :contactNameValidation="this.contactNameValidationn"
                                        :Email="this.email"
                                        :Phone="this.phone"
                                        :TC="this.tcvalidation"
                                        :Adress="this.addressValidation"
                                        :BuyerName ="this.buyerNameValidation"
                                        :BuyerEmail="this.buyerEmailValidation"
                                        :buyerTelephone="this.buyerTelephoneValidation"
                                        :Unvan="this.unvanValidation"
                                        :VergiNumber="this.vergiNumberValidation"
                                    />
                                </client-only>
                            </div>
                            <div class="md-layout-item md-alignment-right md-xlarge-size-20 md-large-sizd-50 md-medium-size-45 md-small-size-50 md-xsmall-size-0">
                                <client-only>
                                    <form-summary
                                        :markaName="this.brand"
                                        :counter="this.counter"
                                        :contactName="this.contactName"
                                        :contactMail="this.contactMail"
                                        :contactPhone="this.contactPhone"
                                        :buyerName="this.buyerName"
                                        :tc="this.tc"
                                        :buyerEmail="this.buyerEmail"
                                        :buyerTelephone="buyerTelephone"
                                        :address="this.address"
                                        :title="this.title"
                                        :vergiNo="this.vergiNo"
                                        :total="this.TotalPrice()"
                                        :AdditionalClassFee="this.AdditionalClassFee()"
                                        @classicModal="GetClassicModal"
                                        @BrandMessage="BrandMessage"
                                        @contactNameValidation="contactNameValidation"
                                        @EmailValidation="mailValidation"
                                        @PhoneValidation="PhoneValidation"
                                        @TcValidation="TcValidation"
                                        @address="AdressValidation"
                                        @buyerNameValidation="BuyerNameValidation"
                                        @buyerEmailValidation="BuyerEmailValidation"
                                        @BuyerPhoneValidation="BuyerPhoneValidation"
                                        @unvanValidation="UnvanValidation"
                                        @VergiNumberValidation="VergiNumberValidation"
                                        @iyzicoform="GetIyzicoModal"
                                    />
                                    <modal v-if="classicModal" @close="classicModalHide">
                                        <template slot="header">
                                            <md-button class="md-simple md-just-icon md-round modal-default-button" @click="classicModalHide">
                                                <md-icon>clear</md-icon>
                                            </md-button>
                                        </template>
                                        <template slot="body">
                                            <md-content class="md-scrollbar">
                                                <sales-agreement
                                                class="sales-agreements-modal"
                                                :name="this.contactName"
                                                :tc="this.tc"
                                                :address="this.address"
                                                :date="this.currentDate()"
                                                :telephone ="this.contactPhone"
                                                :total="this.TotalPrice()"
                                            ></sales-agreement>
                                            </md-content>
                                        </template>
                                    </modal>
                                    <modal v-if="iyzicoForm" @close="iyzicoModalHide">
                                        <template slot="header">
                                            <md-button class="md-simple md-just-icon md-round modal-default-button" @click="iyzicoModalHide">
                                                <md-icon>clear</md-icon>
                                            </md-button>
                                        </template>
                                        <template slot="body">
                                            <iframe src="/pay"
                                                    class="iyzicoForm"
                                            ></iframe>
                                        </template>
                                    </modal>
                                </client-only>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
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

import AppLayout from "../layout/AppLayout.vue";
import axios from "axios";
import Modal from "../components/Modal.vue";
import SalesAgreement from "../components/SalesAgreement.vue";
import OrderForm from "../components/OrderForm.vue";
import FormSummary from "../components/SummaryForm.vue";
import ClientOnly from "vue-client-only";

export default {
    components: {
        ClientOnly,
        AppLayout,
        OrderForm,
        SalesAgreement,
        FormSummary,
        Modal,
    },
    data() {
        return {
            iyizcoModal: false,
            classicModal: false,
            brand: "",
            buyerName: "",
            tc: "",
            title: "",
            email: "",
            buyerEmail: "",
            buyerTelephone: "",
            address: "",
            invoice: "Bireysel",
            checked: false,
            counter: 2,
            classPrice: {},
            total: 0,
            fees: {},
            vergiNo: "",
            contactName: "",
            contactMail: "",
            contactPhone: "",
            officialFees: {},
            AdditionalClass: "",
            marka: "",
            kdv: "",
            buyerNameValidation: "",
            appOfficalFees: "",
            extraClassOfficialFees: "",
            appServiceFees: "",
            brandMessage: "",
            contactNameValidationn: "",
            phone: "",
            tcvalidation: "",
            addressValidation: "",
            buyerTelephoneValidation: "",
            buyerEmailValidation: "",
            unvanValidation: "",
            vergiNumberValidation: "",
            iyzicoForm:false,
            image: require("../assets/img/question-mark.png"),
        };
    },
    methods: {
        currentDate() {
            const current = new Date();
            return current.getFullYear() +
                "-" +
                (current.getMonth() + 1) +
                "-" +
                current.getDate();
        },
        GetIyzicoModal(event){
            this.iyzicoForm = event;
        },
        VergiNumberValidation(event){
            this.vergiNumberValidation = event;
        },
        UnvanValidation(event){
            this.unvanValidation = event;
        },
        BuyerPhoneValidation(event){
            this.buyerTelephoneValidation = event;
        },
        BuyerEmailValidation(event){
            this.buyerEmailValidation= event;
        },
        BuyerNameValidation(event){
            this.buyerNameValidation = event;
        },
        AdressValidation(event) {
            this.addressValidation = event;
        },
        TcValidation(event) {
            this.tcvalidation = event;
        },
        PhoneValidation(event) {
            this.phone = event;
        },
        mailValidation(event) {
            this.email = event;
        },
        contactNameValidation(event) {
            this.contactNameValidationn = event;
        },
        BrandMessage(event) {
            this.brandMessage = event;
        },
        getData() {
            axios.get("/ucret-modeli").then((response) => {
                this.fees = response.data.fees;
                this.officialFees = response.data.officialFees;
                this.classPrice = response.data.classPrice;
                this.extraClassOfficialFees =
                    response.data.extraClassOfficialFees;
                this.appServiceFees = response.data.appServiceFees;
                this.appOfficalFees = response.data.appOfficalFees;
            });
        },
        AdditionalClassFee() {
            if (this.counter === 1) {
                this.AdditionalClass =0;
                return this.AdditionalClass;
            } else if(this.counter >=2) {
                return (this.AdditionalClass =
                    (this.classPrice + this.extraClassOfficialFees) *(
                    this.counter-1));
            }
        },
        TotalPrice() {
            this.total =
                this.appOfficalFees +
                this.appServiceFees +
                (this.extraClassOfficialFees + this.classPrice) * this.counter +
                (this.AdditionalClassFee() +
                    this.appServiceFees +
                    this.extraClassOfficialFees) *
                0.18;
            return this.total;
        },
        GetClassicModal(event) {
            this.classicModal = event;
        },
        classicModalHide() {
            this.classicModal = false;
        },
        iyzicoModalHide(){
            this.iyzicoForm = false;
        },
        GetContactName(event) {
            this.contactName = event;
        },
        GetContactMail(event) {
            this.contactMail = event;
        },
        GetBrandName(event) {
            this.brand = event;
        },
        GetClassCounter(event) {
            this.counter = event;
        },
        GetContactPhone(event) {
            this.contactPhone = event;
        },
        GetBuyerName(event) {
            this.buyerName = event;
        },
        GetTc(event) {
            this.tc = event;
        },
        GetBuyerEmail(event) {
            this.buyerEmail = event;
        },
        GetBuyerTelephone(event) {
            this.buyerTelephone = event;
        },
        GetBuyerAddress(event) {
            this.address = event;
        },
        GetBuyerTitle(event) {
            this.title = event;
        },
        GetVergiNo(event) {
            this.vergiNo = event;
        },
        handleScroll() {
            this.currentScrollValue =
                document.body.scrollTop || document.documentElement.scrollTop;
        },
        scrollListener() {
            resizeThrottler(this.handleScroll);
        },
    },
    mounted() {
        document.addEventListener("scroll", this.scrollListener);
        this.getData();
    },
    beforeDestroy() {
        document.removeEventListener("scroll", this.scrollListener);
    },
};
</script>
