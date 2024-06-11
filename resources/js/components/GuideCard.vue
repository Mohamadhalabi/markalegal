<template>
    <div class="wrapper">
        <a class="card-link" :href="`marka-patent-rehberi/${guide.slug}`">
            <article class="guide-card">
                <img
                    class="guide-image"
                    :src="`images/homeimages/${guide.homeimage}`"
                    :alt="guide.title"
                />
                <div class="article-details">
                    <h2 class="guide-category">MARKA PATENT REHBERİ</h2>
                    <h3 class="guide-title">{{ guide.title }}</h3>
                    <p class="guide-description">
                        {{ guide.description }}
                    </p>
                    <p class="guide-author">
                        Yazar <strong>marka.legal</strong>
                    </p>
                </div>
            </article>
        </a>
    </div>
</template>
<script>
export default {
    props: ["guide"],
};
</script>
