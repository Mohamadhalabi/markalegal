<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
    </url>
    <url>
        <loc>{{ url('/') }}/marka-patent-rehberi</loc>
    </url>
    @foreach ($guides as $guide)
        <url>
            <loc>{{ route('guide', Str::slug($guide->title)) }}</loc>
        </url>
    @endforeach
    <url>
        <loc>{{ url('/') }}/kurumsal/hakkimizda</loc>
    </url>
    <url>
        <loc>{{ url('/') }}/kurumsal/gizlilik-politikasi</loc>
    </url>
    <url>
        <loc>{{ url('/') }}/kurumsal/kvkk-aydinlatma-metni</loc>
    </url>
    <url>
        <loc>{{ url('/') }}/kurumsal/bilgi-guvenligi-politikasi</loc>
    </url>
    <url>
        <loc>{{ url('/') }}/kurumsal/teslimat-ve-iade-politikasi</loc>
    </url>
</urlset>
