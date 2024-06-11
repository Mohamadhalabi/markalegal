<template>
    <div class="container order-form-container">
        <div class="top-text-wrapper">
            <br />
            <h3><img alt="success" :src="image" />Marka Bilgileri</h3>

            <p>Lütfen markanızı tescil edileceği hali ile giriniz.</p>

            <div class="md-layout md-gutter md-alignment-center-left">
                <div class="md-layout-item md-xlarge-size-60 md-large-size-70 md-medium-size-100 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': BrandValidation(), 'md-valid' : this.markaName.trim.length > 2 }">
                        <label class="form-label" style="color:#909090!important;">Marka adı</label>
                        <md-input
                            v-model="markaName"
                            @input="$emit('markaName',$event)"
                        ></md-input>
                        <div v-if="BrandValidation()">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.markaName.length > 2)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="BrandValidation()">
                        <span class="md-danger">{{ BrandMessage }}</span>
                    </div>
                    <div v-if="!BrandValidation()">
                        <span class="md-danger"></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="counter">
                <span>Sınıf sayısı:</span>
                <button class="value-button" id="decrease" @click="add(-1)">
                    -
                </button>
                <input
                    type="number"
                    id="number"
                    :min="min"
                    :max="max"
                    v-model="counter"
                    @input="$emit('counter', $event)"
                    disabled
                />
                <button class="value-button" id="increase" @click="add(+1)">
                    +
                </button>
            </div>
            <br>
            <h3><img alt="success" :src="image" />İletişim Bilgileri</h3>
            <div class="md-layout md-gutter">
                <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': ContactValidation(), 'md-valid' : this.contactName.length >= 3 }">
                        <label style="color:#909090!important;">Ad Soyad</label>
                        <md-input
                            v-model="contactName"
                            @input="$emit('contactName',$event)"
                        ></md-input>
                        <div v-if="ContactValidation()">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="this.contactName.length >= 3">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="ContactValidation()">
                        <span class="md-danger">{{ contactNameValidation }}</span>
                    </div>
                    <div v-if="!ContactValidation()">
                        <span class="md-danger"></span>
                    </div>
                </div>
                <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': (this.Email !== ''  && this.ValidateEmail(this.contactMail) === false), 'md-valid' : (this.ValidateEmail(this.contactMail) === true) }">
                        <label style="color:#909090!important;">Email</label>
                        <md-input
                            v-model="contactMail"
                            @input="$emit('contactMail',$event)"
                        ></md-input>
                        <div v-if="(this.Email !== ''  && this.ValidateEmail(this.contactMail) === false)">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.ValidateEmail(this.contactMail) === true)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="this.Email !== ''  && this.ValidateEmail(this.contactMail) === false">
                        <span class="md-danger">{{ Email }}</span>
                    </div>
                    <div v-if="this.ValidateEmail(this.contactMail) === true">
                        <span class="md-danger"></span>
                    </div>
                </div>
            </div>
            <div class="md-layout md-gutter md-alignment-center-left">
                <div class="md-layout-item md-xlarge-size-50 md-large-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error':ContactPhoneValidation(), 'md-valid' : !ContactPhoneValidation() }">
                        <label style="color:#909090!important;">Telefon</label>
                        <md-input
                            v-model="contactPhone"
                            @input="$emit('contactPhone',$event)"
                        >
                        </md-input>
                        <div v-if="(this.Phone !== '' && ContactPhoneValidation())">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.ValidatePhone(this.contactPhone) === true)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="ContactPhoneValidation()">
                        <span class="md-danger">{{ Phone }}</span>
                    </div>
                    <div v-if="!ContactPhoneValidation()">
                        <span class="md-danger"></span>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <h3>
                    <img alt="success" :src="image" />
                    Marka Hak Sahibi ve Fatura Bilgileri
                </h3>
                <p>
                    Marka hak sahibi bireysel ya da kurumsal olabilir. Lütfen
                    tescilin adına yapılacağı hak sahibinin bilgilerini giriniz.
                </p>
                <div class="radio-button">
                    <md-radio
                        class="md-primary"
                        v-model="picked"
                        value="Bireysel"
                    >Bireysel</md-radio
                    >
                    <md-radio
                        class="md-primary"
                        v-model="picked"
                        value="Kurumsal"
                    >Kurumsal</md-radio
                    >
                </div>
            </div>
            <div v-if="this.picked === 'Bireysel'">
                <div class="md-layout md-gutter">
                    <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                        <md-field v-bind:class="{'md-error': BuyerNameValidation(), 'md-valid' : (this.buyerName.length >= 3) }">
                            <label style="color:#909090!important;">Ad Soyad</label>
                            <md-input
                                v-model="buyerName"
                                @input="$emit('buyerName',$event)"
                            ></md-input>
                            <div v-if="BuyerNameValidation()">
                                <md-icon
                                >clear
                                </md-icon>
                            </div>
                            <div v-if="(this.buyerName.length >= 3)">
                                <md-icon
                                >done
                                </md-icon>
                            </div>
                        </md-field>
                        <div v-if="BuyerNameValidation()">
                            <span class="md-danger">{{ BuyerName }}</span>
                        </div>
                        <div v-if="!BuyerNameValidation()">
                            <span class="md-danger"></span>
                        </div>
                    </div>
                    <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                        <md-field v-bind:class="{'md-error': TCValidation(), 'md-valid' : this.tc.length === 11}">
                            <label style="color:#909090!important;">TCKN</label>
                            <md-input
                                v-model="tc"
                                @input="$emit('tc',$event)"
                            ></md-input>
                            <div v-if="(TCValidation())">
                                <md-icon
                                >clear
                                </md-icon>
                            </div>
                            <div v-if="(this.tc.length === 11)">
                                <md-icon
                                >done
                                </md-icon>
                            </div>
                        </md-field>
                        <div v-if="TCValidation()">
                            <span class="md-danger">{{ TC }}</span>
                        </div>
                        <div v-if="this.tc.trim.length === 11">
                            <span class="md-success"></span>
                        </div>
                    </div>
                </div>
                <span
                    class="md-danger"
                ></span
                >
            </div>
            <div v-if="this.picked === 'Kurumsal'">
                <div class="md-layout md-gutter">
                    <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                        <md-field v-bind:class="{'md-error': UnvanValidation(), 'md-valid' : this.title.length >= 3 }">
                            <label style="color:#909090!important;">Ünvan</label>
                            <md-input
                                v-model="title"
                                @input="$emit('buyerTitle',$event)"
                            ></md-input>
                            <div v-if="(UnvanValidation())">
                                <md-icon
                                >clear
                                </md-icon>
                            </div>
                            <div v-if="this.title.length >= 3">
                                <md-icon
                                >done
                                </md-icon>
                            </div>
                        </md-field>
                        <div v-if="UnvanValidation()">
                            <span class="md-danger">{{ Unvan }}</span>
                        </div>
                        <div v-if="!UnvanValidation()">
                            <span class="md-danger"></span>
                        </div>
                    </div>
                    <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                        <md-field v-bind:class="{'md-error': VergiNumberValidation(), 'md-valid' : this.vergiNo.length === 10}">
                            <label style="color:#909090!important;">Vergi No</label>
                            <md-input
                                v-model="vergiNo"
                                @input="$emit('vergiNo',$event)"
                            ></md-input>
                            <div v-if="VergiNumberValidation()">
                                <md-icon
                                >clear
                                </md-icon>
                            </div>
                            <div v-if="this.vergiNo.length === 10">
                                <md-icon
                                >done
                                </md-icon>
                            </div>
                        </md-field>
                        <div v-if="VergiNumberValidation()">
                            <span class="md-danger">{{ VergiNumber }}</span>
                        </div>
                        <div v-if="this.vergiNo.length === 10">
                            <span class="md-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-layout md-gutter">
                <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': (this.BuyerEmail !== '' && this.ValidateEmail(this.mail) === false), 'md-valid' : (this.ValidateEmail(this.mail) === true) }">
                        <label style="color:#909090!important;">Email</label>
                        <md-input
                            v-model="mail"
                            @input="$emit('buyerEmail',$event)"
                        ></md-input>
                        <div v-if="(this.BuyerEmail !== '' && this.ValidateEmail(this.mail) === false)">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.ValidateEmail(this.mail) === true)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="this.BuyerEmail !== '' && this.ValidateEmail(this.mail) === false">
                        <span class="md-danger">{{ BuyerEmail }}</span>
                    </div>
                    <div v-if="this.ValidateEmail(this.mail) === true">
                        <span class="md-danger"></span>
                    </div>
                </div>
                <div class="md-layout-item md-xlarge-size-50 md-medium-size-50 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': BuyerPhoneValidation(), 'md-valid' : !BuyerPhoneValidation()}">
                        <label style="color:#909090!important;">Telefon</label>
                        <md-input
                            v-model="telephone"
                            @input="$emit('buyerTelephone',$event)"
                        ></md-input>
                        <div v-if="(this.buyerTelephone !== '' && BuyerPhoneValidation())">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.ValidatePhone(this.telephone) === true)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="BuyerPhoneValidation()">
                        <span class="md-danger">{{ buyerTelephone }}</span>
                    </div>
                    <div v-if="!BuyerPhoneValidation()">
                        <span class="md-danger"></span>
                    </div>
                </div>
            </div>
            <div class="md-layout md-gutter md-alignment-center-left">
                <div class="md-layout-item md-xlarge-size-100 md-medium-size-100 md-small-size-50 md-xsmall-size-100">
                    <md-field v-bind:class="{'md-error': (this.Adress !== '' && this.address.length <= 9), 'md-valid' : (this.address.length >=10)}">
                        <label style="color:#909090!important;">Adress</label>
                        <md-textarea
                            v-model="address"
                            @input="$emit('address',$event)"
                            md-autogrow
                            style="height: 120px!important"
                        ></md-textarea>
                        <div v-if="(this.Adress !== '' && this.address.length <= 9)">
                            <md-icon
                            >clear
                            </md-icon>
                        </div>
                        <div v-if="(this.address.length >= 10)">
                            <md-icon
                            >done
                            </md-icon>
                        </div>
                    </md-field>
                    <div v-if="this.Adress !== '' && this.address.length <= 9">
                        <span class="md-danger">{{ Adress }}</span>
                    </div>
                    <div v-if="this.address.length >= 10">
                        <span class="md-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        "BrandMessage",
        "contactNameValidation",
        "Email",
        "Phone",
        "TC",
        "Adress",
        "BuyerName",
        "BuyerEmail",
        "buyerTelephone",
        "Unvan",
        "VergiNumber",
    ],
    data() {
        return {
            picked: "Bireysel",
            min: 1,
            max: 50,
            counter: 2,
            buyerName: "",
            tc: "",
            address: "",
            mail: "",
            telephone: "",
            vergiNo: "",
            title: "",
            markaName: "",
            contactName: "",
            contactPhone: "",
            contactMail: "",
            image: require("../assets/img/accept.png"),
        };
    },

    methods: {
        add(by) {
            let result = parseInt(this.counter) + parseInt(by);
            this.counter = result;
            this.$emit("counter", this.counter);

            if (this.counter < 1) {
                this.counter = 1;
                this.$emit("counter", this.counter);
            }
            if (this.counter >= 50) {
                this.counter = 50;
                this.$emit("counter", this.counter);
            }
        },
        ValidateEmail(email) {
            return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
        },
        ValidatePhone(phone){
            return /^5(0[5-7]|[3-5]\d) ?\d{3} ?\d{4}$/.test(phone);
        },
        BrandValidation(){
          return !!(this.markaName.length <= 2 & this.BrandMessage !== '');
        },
        ContactValidation(){
            return !!(this.contactName.length <= 2 & this.contactNameValidation !== '');
        },
        ContactPhoneValidation(){
            return this.Phone !== '' && this.ValidatePhone(this.contactPhone) === false;
        },
        BuyerNameValidation(){
            return !!(this.buyerName.length <= 2 & this.BuyerName !== '');
        },
        TCValidation(){
          return !!(this.TC !== '' & this.tc.length !== 11);
        },
        UnvanValidation(){
            return this.Unvan !== '' && this.title.length < 3;
        },
        VergiNumberValidation(){
            return !!(this.VergiNumber !== '' & this.vergiNo.length !== 10);
        },
        BuyerPhoneValidation(){
            return this.buyerTelephone !== '' && this.ValidatePhone(this.telephone) === false;
        }
    },
    mounted(){

    }
};
</script>
