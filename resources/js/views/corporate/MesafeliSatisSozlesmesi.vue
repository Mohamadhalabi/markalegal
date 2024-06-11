<template>
    <app-layout>
        <div class="wrapper">
            <parallax class="section page-header">
                <div class="container">
                    <div class="col-12 text-center">
                        <h1 class="title">Mesafeli Satış Sözleşmesi</h1>
                    </div>
                </div>
            </parallax>
            <SalesAgreement />
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "../../layout/AppLayout";
import SalesAgreement from "../../components/SalesAgreement";
export default {
    components: {
        AppLayout,
        SalesAgreement,
    },
};
</script>
