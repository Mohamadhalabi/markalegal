<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Price;
use Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Ramsey\Uuid\Guid\Guid;
use Cache;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);
        return Inertia::render('Index')->withViewData([
            'title' => "Marka.Legal - Ücretsiz Marka Sorgulama",
            'description' => "marka.legal, Marka hukuku ve marka uygulamaları konusunda uzun yıllar boyu tecrübeli uzman Marka Legal ekibi, markayı bir fikri ve sınai mülkiyet hakkı olarak bütünsel bir yaklaşımla ele alır ve fikri haklarınızı en iyi şekilde korumanız için size danışmanlık ve vekillik hizmeti sağlar.",
        ]);
    }

    public function hakkimizda()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);

        return Inertia::render('corporate/Hakkimizda')->withViewData([
            'title' => "Marka.Legal - Hakkımızda",
            'description' => "marka.legal, Marka danışmanları, marka vekilleri ve avukatlardan oluşan Türkiye’de fikri ve sınai mülkiyet alanında çalışan uzman bir ekiptir.",
        ]);
    }

    public function gizlilikPolitikasi()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);

        return Inertia::render('corporate/GizlilikPolitikasi')->withViewData([
            'title' => "Marka.Legal - Gizlilik Politikası",
            'description' => "marka.legal'da müşteri gizliliği önceliğimizdir. Gizlilik Politikası sayfamızda, kişisel verilerin işlenmesi ve korunması hakkındaki uygulamalarımızı öğrenebilirsiniz.",
        ]);
    }

    public function kvkkAydinlatmaMetni()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);
        return Inertia::render('corporate/KVKKAydinlatmaMetni')->withViewData([
            'title' => "Marka.Legal - KVKK Aydınlatma Metni",
            'description' => "Müşterilerimizin kişisel verilerinin korunması bizim önceliğimizdir. marka.legal, KVKK Aydınlatma Metni sayfasında kişisel verilerin işlenmesi ve korunması hakkında detaylı bilgi veriyor.",
        ]);
    }

    public function bilgiGuvenligiPolitikasi()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);
        return Inertia::render('corporate/BilgiGuvenligiPolitikasi')->withViewData([
            'title' => "Marka.Legal - Bilgi Güvenliği Politikası",
            'description' => "marka.legal olarak müşterilerimizin bilgilerinin güvenliği bizim önceliğimizdir. Bilgi Güvenliği Politikası sayfamızda, bu konudaki yaklaşımımızı ve uygulamalarımızı öğrenebilirsiniz.",
        ]);
    }

    public function markaPatentRehberi()
    {
        $items = Guide::paginate(1)->through(function($item){
            return[
                'id'=> $item->id,
                'slug' => $item->slug,
                'title' => $item->title,
                'description' => $item->description,
                'image' => $item->image
            ];
        });
        $data = [
            'queryButtonVisibleProp' => false,
            'guides' => $items
        ];
        Inertia::share('data', $data);
        return Inertia::render('MarkaPatentRehberi')->withViewData([
            'title' => "Marka.Legal - Marka Patent Rehberi",
            'description' => "Patent ve marka tescili hakkında bilgi ve ipuçları burada! marka.legal, müşterilerine doğru adımlar atmalarında yardımcı oluyor.",
            'queryButtonVisibleProp' => false,
        ]);
    }

    public function online()
    {
        $result = Price::where(function ($q) {
            return $q->whereNull('item')
                ->orWhereNull('price')
                ->orWhereNull('currency')
                ->orwhereNull('year')
                ->orwhere('item', '=', '')
                ->orwhere('price', '=', '')
                ->orwhere('currency', '=', '')
                ->orwhere('year', '=', '');
        })->first();
        if ($result == null && $result == '') {
            $data = [
                'queryButtonVisibleProp' => false
            ];
            Inertia::share('data', $data);
            return Inertia::render('BrandRegistration')->withViewData([
                'title' => "Marka.Legal - Marka-Basvurusu-Talebi",
                'description' => "marka.legal ile kolayca marka başvurusu yapın! Türkiye'de marka tescili işlemleri için uzman desteği alın. Başvuru talebinizi hemen oluşturun.",
            ]);
        } else {
            abort(503);
        }
    }

    public function teslimatVeIadePolitikasi()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);
        return Inertia::render('corporate/TeslimatVeIadePolitikasi')->withViewData([
            'title' => "Marka.Legal - Teslimat ve İade Politikası",
            'description' => "marka.legal'da müşteri memnuniyeti bizim önceliğimizdir. Teslimat ve İade Politikası sayfamızda, ürün teslimatı ve iade prosedürlerimiz hakkında detaylı bilgi edinebilirsiniz.",
            'queryButtonVisibleProp' => true
        ]);
    }

    public function mesafeliSatisSozlesmesi()
    {
        $data = [
            'queryButtonVisibleProp' => true
        ];
        Inertia::share('data', $data);
        return Inertia::render('corporate/MesafeliSatisSozlesmesi')->withViewData([
            'title' => "Marka.Legal - Mesefeli Satış Sözleşmesi",
            'description' => "marka.legal olarak müşteri memnuniyeti bizim önceliğimizdir. Mesafeli Satış Sözleşmesi sayfamızda, online satış işlemleriyle ilgili bilgileri ve tarafların haklarını detaylı olarak bulabilirsiniz.",
            'queryButtonVisibleProp' => true
        ]);
    }
    /**
     * list
     *
     * @return void
     */
    public function list()
    {
        $fees = Price::where('id', '=', '1')->orWhere('id', '=', '2')->get();
        $officialFees = Price::where('id', '=', '5')->get();
        $classPrice = Price::select('price')->where('id', '=', '4')->first()->price;
        $extraClassOfficialFees = Price::select('price')->where('id', '=', '3')->first()->price;
        $appServiceFees = Price::where('id', '=', '1')->first()->price;
        $appOfficalFees = Price::where('id', '=', '2')->first()->price;
        return response()->json([
            'fees' => $fees,
            'officialFees' => $officialFees,
            'classPrice' => $classPrice,
            'extraClassOfficialFees' => $extraClassOfficialFees,
            'appServiceFees' => $appServiceFees,
            'appOfficalFees' => $appOfficalFees,
        ], Response::HTTP_OK);
    }

    public function guides()
    {
        $guides = Guide::paginate(4);
        return response()->json($guides);
    }

    public function guide($guide)
    {
        $guide = Guide::where('slug', '=', $guide)->first();

        // If the guide doesn't exist, return a 404 response.
        if($guide == null) abort(404);

        $data = [
            'queryButtonVisibleProp' => true,
            'guide' => $guide
        ];
        Inertia::share('data', $data);

        $clean_string = strip_tags($guide->content);
        $first_150_chars  = substr($clean_string, 0, 150);

        return Inertia::render('Guide')->withViewData([
            'title' => $guide->title,
            'description' => $guide->description,
            'queryButtonVisibleProp' => true
        ]);
    }
}
