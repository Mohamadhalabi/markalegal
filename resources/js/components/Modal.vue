<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container" v-click-outside="closeModal">
                    <div class="modal-header">
                        <slot name="header"></slot>
                    </div>

                    <div class="modal-body text-center">
                        <slot name="body"></slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "modal",
    methods: {
        closeModal: function () {
            this.$emit("close");
        },
    },
};
</script>

<style lang="scss">
.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
.modal-container {
    background-color: #f8f4e3;
    box-shadow: 0px 0px 50px 30px rgb(0 0 0 / 30%);
}
.modal-container input {
    background-image: linear-gradient(360deg, #ece9e6, #ffffff);
    width: 270px;
    padding: 1.2em;
    margin-top: 20px;
    border-bottom: 3.1px #616161 solid;
    border-right: 3.1px #616161 solid;
    border-left: 2.2px #919291 solid;
    border-top: 2.2px #919291 solid;
    border-radius: 0.5rem 0.5rem 0.5rem 0.5rem;
    color: #2a2b2a;
    letter-spacing: 2px;
    font-family: Cabin, Geneva, Verdana, sans-serif;
    font-size: 14px;
}
.modal-mask {
    background-color: rgb(0 0 0 / 35%);
}
</style>
