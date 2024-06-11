<template>
    <div>
        <response :response="this.response"></response>
        <div>   <!-- TODO: removed a class here. Check if ok and remove it from style.css if it is not used elsewhere-->
            <form>  <!-- TODO: removed a class here. Check if ok and remove it from style.css if it is not used elsewhere-->
                <md-field :class="{'md-error': this.validationError.marka}">
                    <label>Marka Adı</label>
                    <md-input
                        type="text"
                        name="marka"
                        v-model.trim="marka"
                    /> <!-- TODO: removed a class here (inputError). Check if ok and remove it from style.css if it is not used elsewhere-->
                </md-field>
                <md-field :class="{'md-error': this.validationError.isim }">
                    <label>İsminiz</label>
                    <md-input
                        type="text"
                        name="isim"
                        v-model.trim="isim"
                    />
                </md-field>
                <md-field :class="{'md-error': this.validationError.telefon}" >
                    <label>Telefon</label>
                    <md-input
                        type="text"
                        name="telefon"
                        v-model.trim="telefon"
                    />
                </md-field>
                <md-checkbox
                    class="pb-20 md-primary"
                    v-model="checked"
                >
                    <span :class="{checkedError: this.validationError.checked && !this.checked}"> Gizlilik ilkelerini okudum ve iletişim izni veriyorum.</span>
                </md-checkbox>
                <div class="text-center">
                    <md-button
                        class="md-danger"
                        value="Sorgulat"
                        @click.prevent="FormValidation"
                    >Markayı Sorgulat</md-button
                    >
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Response from "../components/Response.vue";
export default {
    props: ["isModal"],
    components: {
        Response,
    },
    watch: {
        checked: function () {
            if (this.validationError.checked == false && this.checked == false)
                this.validationError.checked = true;
            else this.validationError.checked = false;
        },
    },
    data() {
        return {
            marka: "",
            isim: "",
            telefon: "",
            checked: false,
            validationError: {
                marka: false,
                isim: false,
                telefon: false,
                checked: false,
            },
            response: {
                isActive: false,
                title: "",
                body: "",
            },
        };
    },
    methods: {
        FormValidation() {
            const errors = [];
            errors.pop(); // TODO: why pop an empty array just defined?
            if (this.marka === "") {
                this.validationError.marka = true;
            } else this.validationError.marka = false;
            if (this.isim === "") {
                this.validationError.isim = true;
            } else this.validationError.isim = false;
            if (this.telefon === "") {
                this.validationError.telefon = true;
            } else this.validationError.telefon = false;
            if (this.checked === false) {
                this.validationError.checked = true;
            } else this.validationError.checked = false;
            if (
                this.validationError.marka === false &&
                this.validationError.isim === false &&
                this.validationError.telefon === false &&
                this.validationError.checked === false
            ) {
                this.sendEmail();
            } else {
                this.$emit("formValidation", false); //TODO: who listens to this? Also needs better (more unique) naming.
            }
        },
        errorResponse() {
            this.response.isActive = true;
            this.response.title = "Hata";
            this.response.body =
                "Bir hata oluştu, lütfen daha sonra tekrar deneyiniz.";
        },
        successResponse(name, marka) {
            this.response.isActive = true;
            this.response.title = "Başarılı";
            this.response.body = `Sayın <strong>${name}</strong>, <strong>${marka}</strong> markanız için sorgulatma talebiniz alınmıştır. En kısa sürede aranmak üzere lütfen bekleyiniz. Marka uzmanımız markanıza özel bir çalışma yapacak ve sizi verdiğiniz numaradan arayacaktır. Teşekkür ederiz. Saygılarımızla, <strong>Marka Legal Ekibi</strong>.`;
        },
        sendEmail() {
            axios
                .post("/contact/store", {
                    marka: this.marka,
                    name: this.isim,
                    phone: this.telefon,
                    form_type: "query",
                })
                .then((response) => {
                    if (response.data.status === "success")
                        this.successResponse(this.isim, this.marka);
                    else this.errorResponse(); //TODO: report back form validation error from backend instead of a generic error
                })
                .catch(() => {
                    this.errorResponse();
                });
        },
    },
};
</script>
