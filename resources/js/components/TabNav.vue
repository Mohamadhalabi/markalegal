<template>
    <div>
        <div v-for="tab in tabs" :key="tab" class="tabs">
            <input
                type="radio"
                :class="{ selected: tab === selected }"
                @click="setTab(tab)"
                name="option"
                class="radioButton"
                checked
            />
            {{ tab }}
        </div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    props: {
        tabs: {
            type: Array,
            required: true,
        },
        selected: {
            type: String,
            required: true,
        },
    },
    methods: {
        setTab(tab) {
            this.$emit("selected", tab);
        },
    },
};
</script>

<style scoped>
li {
    list-style: none;
    display: inline-block;
}
.radioButton {
    display: inline;
}
.tabs {
    display: inline-flex;
}
</style>
