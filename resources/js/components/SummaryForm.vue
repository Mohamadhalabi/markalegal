<template>
    <div id="FormContainer">
        <h4>Başvuru Özetiniz</h4>
        <br />
        <p>
            Marka <span>{{ markaName }}</span>
        </p>
        <p>
            Sınıf sayısı <span>{{ counter }}</span>
        </p>
        <div v-for="fee in fees" :key="fee.id">
            <p>
                {{ fee.item }}: <span> {{ fee.price }} {{ fee.currency }}</span>
            </p>
        </div>
        <p>
            Ek sınıf ücreti:<span> {{ AdditionalClassFee }} TL</span>
        </p>
        <p>
            KDV (18%):<span>{{ TaxPrice() }} TL</span>
        </p>
        <p>
            Resmi başvuru ücretleri:
            <img
                alt="question-mark"
                style="cursor: help"
                :src="image"
            />
            <md-tooltip md-direction="bottom" style="font-size: 18px;background: #292a2d;height: 25px;">Resmi başvuru harçları ödemeye dahildir.</md-tooltip>
            <span>Dahildir</span>
        </p>
        <div v-for="officialFee in officialFees" :key="officialFee.id">
            <p id="note">
                Resmi tescil ücretleri:
                <img
                    alt="question-mark"
                    style="cursor: help"
                    :src="image"
                />
                <md-tooltip md-direction="bottom" style="font-size: 18px;background: #292a2d;height: 25px;">Resmi tescil harçları başvuru süreci sonrasında tescil kararından sonra oluşacaktır ve {{officialFee.year}} yılı için {{officialFee.price}} TL’dir.</md-tooltip>
                <span>Hariçtir</span>
            </p>
        </div>
        <div id="price">
            <form>
                <md-button
                    class="md-danger paymentButton"
                    value="Sorgulat"
                    @click.prevent="Payment"
                    style="float: right"
                >{{ total }} TL ÖDE</md-button
                >
            </form>
            <md-checkbox
                class="pb-20"
                style="max-width: 50%"
                type="checkbox"
                v-model="checked"
                id="flexCheckDefault"
            >
                <label class="terms-and-conditions"
                       for="flexCheckDefault"

                >
                    <a
                        @click="
                            classicModal = true;
                            $emit('classicModal', $event);
                        "
                        :class="{checkedError: this.validations.checked && !this.checked}"
                    >
                        Mesafeli satış sözleşmesini
                    </a>
                    <div :class="{checkedError: this.validations.checked && !this.checked}">
                        okudum ve onaylıyorum.
                    </div>
                </label>
            </md-checkbox>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Modal from "../components/Modal.vue";
export default {
    components: {
        Modal,
    },
    props: [
        "markaName",
        "counter",
        "contactName",
        "contactMail",
        "contactPhone",
        "buyerName",
        "tc",
        "buyerEmail",
        "buyerTelephone",
        "address",
        "title",
        "vergiNo",
        "total",
        "AdditionalClassFee",
    ],
    watch: {
        checked: function () {
            if (this.validations.checked == false && this.checked == false)
                this.validations.checked = true;
            else this.validations.checked = false;
        },
    },
    data() {
        return {
            iyzicoform: false,
            checked: false,
            classicModal: false,
            fees: {},
            officialFees: {},
            classPrice: {},
            kdv: "",
            appOfficalFees: "",
            extraClassOfficialFees: "",
            appServiceFees: "",
            validations:{
                brandValidation: false,
                contactNameValidation: false,
                contactEmailValidation: false,
                contactPhoneValidation: false,
                buyerNameValidation: false,
                buyerEmailValidation: false,
                buyerPhoneValidation: false,
                TcValidation: false,
                addressValidation: false,
                unvanValidation: false,
                vergiNoValidation: false,
                checked: false
            }
            ,
            response: {
                isActive: false,
                title: "",
                body: "",
            },
            image: require("../assets/img/question-mark.png"),
        };
    },
    methods: {
        getData() {
            axios.get("/ucret-modeli").then((response) => {
                this.fees = response.data.fees;
                this.officialFees = response.data.officialFees;
                this.classPrice = response.data.classPrice;
                this.extraClassOfficialFees = response.data.extraClassOfficialFees;
                this.appServiceFees = response.data.appServiceFees;
                this.appOfficalFees = response.data.appOfficalFees;
            });
        },
        TaxPrice() {
            this.kdv =
                (this.AdditionalClassFee +
                    this.appServiceFees +
                    this.extraClassOfficialFees) *
                0.18;
            return parseFloat(this.kdv).toFixed(2);
        },
        Payment() {
            if (this.markaName.length <= 2) {
                this.$emit("BrandMessage", "Lütfen markanızın adını giriniz");
                this.validations.brandValidation = true;
            }
            if (this.markaName.length >= 3) {
                this.$emit("BrandMessage", "");
                this.validations.brandValidation = false;
            }

            if (this.contactName.length <= 2) {
                this.$emit("contactNameValidation", "Ad ve Soyadı gereklidir");
                this.validations.contactNameValidation = true;
            }
            if (this.contactName.length >= 3) {
                this.$emit("contactNameValidation", "");
                this.validations.contactNameValidation = false;
            }

            if (this.ValidateEmail(this.contactMail) === true){
                this.$emit("EmailValidation","");
                this.validations.contactEmailValidation = false;
            }

            if (this.ValidateEmail(this.contactMail) === false){
                this.$emit("EmailValidation","Lütfen geçerli e-posta adresini giriniz")
                this.validations.contactEmailValidation = true;
            }

            if (this.ValidatePhone(this.contactPhone) === true) {
                this.$emit("PhoneValidation", "");
                this.validations.contactPhoneValidation = false;
            }

            if (this.ValidatePhone(this.contactPhone) === false) {
                this.$emit("PhoneValidation", "Geçerli bir telefon numarası giriniz");
                this.validations.contactPhoneValidation = true;
            }

            if (this.buyerName.length <= 0) {
                this.$emit("buyerNameValidation", "Ad ve Soyadı gereklidir");
                this.validations.buyerNameValidation = true;
            }
            if (this.buyerName.length > 0) {
                this.$emit("buyerNameValidation", "");
                this.validations.buyerNameValidation = false;
            }

            if (this.ValidatePhone(this.buyerTelephone) === true) {
                this.$emit("BuyerPhoneValidation", "");
                this.validations.buyerPhoneValidation = false;
            }

            if (this.ValidatePhone(this.buyerTelephone) === false) {
                this.$emit("BuyerPhoneValidation", "Geçerli bir telefon numarası giriniz");
                this.validations.buyerPhoneValidation = true;
            }

            if (this.tc.length !== 11) {
                this.$emit("TcValidation", "Geçerli bir TC girin");
                this.validations.TcValidation = true;
            }

            if(this.tc.length === 11){
                this.$emit("TcValidation","");
                this.validations.TcValidation = false;
            }

            if (this.address.length <= 9) {
                this.$emit("address", "Adres gereklidir");
                this.validations.addressValidation = true;
            }
            if (this.address.length >= 10) {
                this.$emit("address", "");
                this.validations.addressValidation = false;
            }

            if (this.ValidateEmail(this.buyerEmail) === true){
                this.$emit("buyerEmailValidation","");
                this.validations.buyerEmailValidation = false;
            }

            if (this.ValidateEmail(this.buyerEmail) === false){
                this.$emit("buyerEmailValidation","Lütfen geçerli e-posta adresini giriniz")
                this.validations.buyerEmailValidation = true;
            }

            if (this.title.length <= 0) {
                this.$emit("unvanValidation", "ünvan gereklidir");
                this.validations.unvanValidation = true;
            }
            if (this.title.length > 0) {
                this.$emit("unvanValidation", "");
                this.validations.unvanValidation = false;
            }

            if (this.vergiNo.length !== 10) {
                this.$emit("VergiNumberValidation", "Vergi numarası gerekli");
                this.validations.vergiNoValidation = true;
            }

            if(this.vergiNo.length === 10) {
                this.$emit("VergiNumberValidation","");
                this.validations.vergiNoValidation = false;
            }

            if (this.checked === false) {
                this.validations.checked = true;
            } else this.validations.checked = false;


            if((this.validations.brandValidation === false)  && (this.validations.contactNameValidation === false) &&
                (this.validations.contactEmailValidation === false) && (this.validations.contactPhoneValidation === false)&&
                (this.validations.buyerNameValidation === false || this.validations.unvanValidation === false) && (this.validations.buyerEmailValidation === false) &&
                (this.validations.buyerPhoneValidation === false) && (this.validations.TcValidation === false || this.validations.vergiNoValidation === false) &&
                (this.validations.addressValidation === false) && (this.checked === true)){
                axios.post("/payment", {
                    brand_name: this.markaName,
                    number_of_classes: this.counter,
                    contact_name: this.contactName,
                    contact_email: this.contactMail,
                    contact_telephone: this.contactPhone,
                    buyer_name: this.buyerName,
                    tckn: this.tc,
                    vergi_no: this.vergiNo,
                    unvan: this.title,
                    email: this.buyerEmail,
                    telephone: this.buyerTelephone,
                    address: this.address,
                    price: this.total,
                });
                this.iyzicoform= true
                this.$emit('iyzicoform',this.iyzicoform);
            }
        },
        ValidateEmail(email) {
            return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
        },
        ValidatePhone(phone) {
            return /^5(0[5-7]|[3-5]\d) ?\d{3} ?\d{4}$/.test(phone);
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
