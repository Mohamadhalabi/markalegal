module.exports = {
    chainWebpack: config => {
        config.plugin('html').tap(args => {
            args[0].minify = false
            return args
        })
    },
    configureWebpack: {
        output: {
            filename: '[name].[hash].js',
            chunkFilename: '[name].[hash].js'
        }
    },
    devServer: {
        headers: {
            'Cache-Control': 'public, max-age=31536000'
        }
    },
    pluginOptions: {
        sitemap: {
            urls: [
                'https://marka.legal/',
                'https://marka.legal/terms-of-service',
                'https://marka.legal/marka-patent-rehberi/marka-nedir',
                'https://marka.legal/marka-patent-rehberi/marka-tescili-nasil-yapilir',
                'https://marka.legal/marka-patent-rehberi/marka-sorgulamasi-nasil-yapilir',
                'https://marka.legal/kurumsal/hakkimizda',
                'https://marka.legal/kurumsal/gizlilik-politikasi',
                'https://marka.legal/kurumsal/kvkk-aydinlatma-metni',
                'https://marka.legal/kurumsal/bilgi-guvenligi-politikasi',
            ]
        }
    }
}
