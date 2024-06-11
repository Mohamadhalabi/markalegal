<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinifclass', function (Blueprint $table) {
            $table->id();
            $table->string('sinif');
            $table->longText('content');
            $table->timestamps();
        });
        $sinif1="<tr>
        <td>Sanayide, bilim sahasında, fotoğrafçılıkta, tarım, bahçecilik ve ormancılıkta kullanılan kimyasallar. </td>
        </tr>
        <tr>
        <td>Gübreler ve topraklar.</td>
        </tr>
        <tr>
        <td>İşlenmemiş suni reçineler ve işlenmemiş plastikler.</td>
        </tr>
        <tr>
        <td>Yangın söndürücü maddeler.</td>
        </tr>";
        $sinif2="<tr>
        <td>Boyalar, vernikler, laklar, pas önleyiciler, ahşabı koruyucu maddeler, boyalar için bağlayıcı ve inceltici maddeler, boya pigmentleri,  metali koruyucu maddeler, ayakkabı boyaları; matbaa boyaları ve mürekkepleri, tonerler (dolu halde toner kartuşları dahil); besin maddelerini, ispençiyari ürünleri ve içecekleri boyamaya mahsus maddeler. </td>
        </tr>
        <tr>
        <td>İşlenmemiş doğal reçineler.</td>
        </tr>
        <tr>
        <td>Boyacılar, dekoratörler, matbaacılar ve sanatçılar için metal levhalar ve toz halde metaller.</td>
        </tr>";
        $sinif3="<tr>
        <td><b>Ağartma ve temizlik amaçlı maddeler: deterjanlar, çamaşır suları, çamaşır yumuşatıcıları, leke çıkarıcılar, bulaşık yıkama maddeleri.</b></td>
        </tr>
        <tr>
        <td>Parfümeri; kozmetik ürünleri, kişisel kullanım amaçlı koku vericiler (insan ve hayvanlar için deodorantlar dahil).</td>
        </tr>
        <tr>
        <td>Sabunlar.</td>
        </tr>
        <tr>
        <td><b>Diş bakımı ürünleri: diş macunları, diş parlatma ve beyazlatma maddeleri, tıbbi amaçlı olmayan ağız gargaraları.</b></td>
        </tr>
        <tr>
        <td><b>Aşındırıcı ürünler: zımpara bezleri, zımpara kağıtları,  ponza taşları, aşındırıcı pastalar.</b></td>
        </tr>
        <tr>
        <td><b>Deri, vinil, metal ve ahşap için parlatma ve bakım ürünleri: cilalar, bakım kremleri, cilalama amaçlı vaks.</b></td>
        </tr>";
        $sinif4="<tr>
        <td>Sınai amaçlı yağlar, gresler,<b>kesme sıvıları, toz emici-ıslatıcı ve bağlayıcı maddeler.</b></td>
        </tr>
        <tr>
        <td>Katı yakıtlar: kömürler, odun.</td>
        </tr>
        <tr>
        <td><b>Sıvı ve gaz yakıtlar: benzin, mazot, sıvılaştırılmış petrol gazı, doğal gaz, fueloil ile bunların kimyasal olmayan katkıları.</b></td>
        </tr>
        <tr>
        <td>Aydınlanma amaçlı mumlar, fitiller, yarı mamul vakslar, balmumları (vakslar), parafinler.</td>
        </tr>";
        $sinif5="<tr>
        <td><b>İnsan ve hayvan sağlığı için ilaçlar, tıbbi ve veterinerlik amaçlı kimyasal ürünler, tıbbi ve veterinerlik amaçlı kimyasal reaktif maddeler.</b></td>
        </tr>
        <tr>
        <td><b>Tıbbi ve veterinerlik amaçlı kullanıma uygun diyetetik maddeler;  diyet takviyeleri, gıda (besin) takviyeleri; zayıflama amaçlı tıbbi müstahzarlar; bebek mamaları; tıbbi amaçlı bitkiler ve tıbbi amaçlı bitkisel içecekler.</b></td>
        </tr>
        <tr>
        <td><b>Diş hekimliği için ürünler (aletler/cihazlar hariç): diş dolgu maddeleri, diş kalıbı alma maddeleri, protez ve yapay diş yapıştırma ve tamir maddeleri.</b></td>
        </tr>
        <tr>
        <td>Hijyen sağlayıcı ürünler: pedler, tamponlar, tıbbi amaçlı yakılar, pansuman malzemeleri, kağıt ve tekstilden mamul çocuk bezleri.</td>
        </tr>
        <tr>
        <td>Zararlı bitkileri, hayvanları ve mantarları imha edici maddeler.</td>
        </tr>
        <tr>
        <td>İnsan ve hayvanlar için olanlar hariç deodorantlar, havayı tazeleyici kokular.</td>
        </tr>
        <tr>
        <td>Dezenfektanlar, antiseptikler (mikrop öldürücüler), tıbbi amaçlı deterjanlar.</td>
        </tr>
        ";
        $sinif6="<tr>
        <td>Değerli olmayan maden cevherleri.</td>
        </tr>
        <tr>
        <td>Adi metaller ile bunların alaşımları ve yarı mamulleri.</td>
        </tr>
        <tr>
        <td><b>Barınma, saklama, muhafaza etme, kaplama, sarma, çevreleme, depolama, yerleştirme amaçlı  metalden malzemeler ve araçlar: metalden mamul yapılar, metalden inşaat iskeletleri ve dikmeleri, metal kutular, metal ambalajlar, alüminyum folyo, metalden çitler, korkuluklar, metalden tüpler, metal kaplar, madeni depolar, metal nakliye sandıkları, metal portatif merdivenler.</b></td>
        </tr>
        <tr>
        <td>Eleme, filtreleme ve benzeri amaçlar için yapılmış metalden malzemeler. </td>
        </tr>
        <tr>
        <td>Metalden mamul kapılar ve pencereler, kepenkler, jaluziler, bunların kasaları ve aksamları.</td>
        </tr>
        <tr>
        <td>Elektrik için olmayan madeni kablolar, teller. </td>
        </tr>
        <tr>
        <td>Metalden hırdavatçı (nalburiye) eşyası.</td>
        </tr>
        <tr>
        <td>Metalden havalandırma, ısıtma, kanalizasyon, telefon, yeraltı elektrik ve iklimlendirme tesisatları için havalandırma kanalları, menfezler, menfez kapakları, bacalar, baca şapkaları, menhol (baca) kapakları, ızgaralar.</td>
        </tr>
        <tr>
        <td><b>Metalden mamul işaretle gösterme, yönlendirme, belirtme, tanıtma amaçlı malzemeler: tabelalar, panolar, plakalar, metalden ışıksız trafik yönlendirme işaretleri. </b></td>
        </tr>
        <tr>
        <td><b>Metalden mamul sıvı veya gaz nakli amaçlı borular, sondaj boruları ve bunların bağlantı parçaları: metalden vanalar, manşonlar, dirsekler, klipsler, uzatmalar.</b></td>
        </tr>
        <tr>
        <td>Madeni para kasaları.</td>
        </tr>
        <tr>
        <td><b>Metalden mamul demiryolu malzemeleri: raylar, ray bağlantıları, makaslar.</b></td>
        </tr>
        <tr>
        <td>Madeni iskele babaları ve şamandıraları, madeni dubalar, deniz taşıtları için çapa demirleri.</td>
        </tr>
        <tr>
        <td>Döküm işleri için madeni kalıplar (makine parçası olanlar hariç).</td>
        </tr>
        <tr>
        <td>Adi metallerden veya bunların alaşımlarından yapılmış sanat eserleri.</td>
        </tr>
        <tr>
        <td>Metalden mamul kapaklar, şişe kapakları.</td>
        </tr>
        <tr>
        <td>Madeni direkler.</td>
        </tr>
        <tr>
        <td>Kaldırma, yükleme ve nakil için madeni paletler, madeni halatlar, yük kaldırma ve taşımada kullanılan madeni askılar, bağlar, kolonlar, kuşaklar, bantlar ve şeritler. </td>
        </tr>
        <tr>
        <td>Araç tekerlekleri için metal takozlar.</td>
        </tr>
        ";
        $sinif7="<tr>
        <td><b>Ahşap, metal, cam ve plastik malzemelerin ve madenlerin işlenmesi, bunlara şekil verilmesi için makineler, takım tezgahları ve bu amaçla kullanılan endüstriyel robotlar, üç boyutlu yazıcılar.</b></td>
        </tr>
        <tr>
        <td>İş makineleri: dozerler, kepçeler, ekskavatörler, yol yapım ve kaplama makinaları, sondaj makinaları, kaya delme makinaları, süpürme makinaları ve aynı işleve sahip robotik mekanizmalar. </td>
        </tr>
        <tr>
        <td><b>Kaldırma, taşıma ve iletme makineleri: asansörler, yürüyen merdivenler, vinçler, aynı işleve sahip robotik mekanizmalar.</b></td>
        </tr>
        <tr>
        <td>Tarım, hayvancılık, ziraat sektörlerinde ve tahıl/meyve/sebze/gıda işlenmesinde kullanılan makineler ve robotik mekanizmalar.</td>
        </tr>
        <tr>
        <td><b>Kara taşıtları için olanlar hariç motorlar, elektrikli motorlar, bunların parçaları ve tertibatları: hidrolik, pnömatik kontroller, kara taşıtları için olanlar hariç frenler, balatalar, krank milleri, dişliler, silindirler, pistonlar, türbinler, filtreler;  kara taşıtlarında kullanılan ve bu sınıfta yer alan parçalar: taşıtlar için yağ, yakıt ve hava filtreleri, egzozlar, egzoz manifoldları, silindirler, silindir başları, pistonlar, karbüratörler, yakıt dönüşüm cihazları, enjektörler, yakıt tasarruf cihazları, pompalar, valfler, marşlar, dinamolar, bujiler.</b></td>
        </tr>
        <tr>
        <td>Rulmanlar, bilyalı veya masuralı yataklar.</td>
        </tr>
        <tr>
        <td>Lastik sökme ve takma makineleri.</td>
        </tr>
        <tr>
        <td>Alternatörler, jeneratörler, elektrik jeneratörleri, güneş enerjisi ile çalışan jeneratörler.</td>
        </tr>
        <tr>
        <td>Boya makineleri, otomatik boya püskürtme tabancaları, elektrikli, hidrolik ve pnömatik zımbalama makineleri ve tabancaları, elektrikli yapıştırıcı tabancalar, basınçlı hava veya sıvı püskürtücü makineler için tabancalar, elektrikli el matkapları, motorlu el testereleri, dekupaj makineleri, spiral makineler, basınçlı hava üreticiler, kompresörler, , araç yıkama makineleri ve yukarıda sayılan makine ve araçlarla aynı işleve sahip robotlar.</td>
        </tr>
        <tr>
        <td>Elektrikli ve gazlı kaynak makineleri, elektrikli ark kaynak cihazları, elektrikli lehim cihazları, elektrikli ark kesme cihazları, elektrikli kaynak makine elektrotları ve bunlarla aynı işleve sahip robotlar.</td>
        </tr>
        <tr>
        <td>Matbaa makineleri.</td>
        </tr>
        <tr>
        <td>Ambalajlama makineleri, doldurma-tapalama ve kapatma makineleri, etiketleme makineleri, tasnifleme makineleri ve yukarıda sayılan makinelerle aynı işleve sahip robotlar ve robotik mekanizmalar (elektrikli plastik kapama/mühürleme cihazları [paketleme] dahil).</td>
        </tr>
        <tr>
        <td>Tekstil makineleri, dikiş makineleri ve bunlarla aynı işleve sahip endüstriyel robotlar.</td>
        </tr>
        <tr>
        <td>Makine veya motor parçası olmayan pompalar (akaryakıt dolum ve dağıtım pompaları ve bunların tabancaları dahil).</td>
        </tr>
        <tr>
        <td>Doğrama, öğütme, ezme, çırpma ve ufalama için mutfakta kullanılan elektrikli aletler; yıkama makineleri (çamaşır/bulaşık yıkama makineleri, ısıtmalı olmayan santrifüjlü çamaşır kurutma makineleri dahil); zemin, halı veya döşeme temizleme amaçlı elektrikli makineler, elektrikli süpürgeler ve bunların parçaları.</td>
        </tr>
        <tr>
        <td>Metalden mamul kapaklar, şişe kapakları.</td>
        </tr>
        <tr>
        <td>Otomatik satış makineleri.</td>
        </tr>
        <tr>
        <td>Galvanizle kaplama ve elektroliz (akımla kaplama) makineleri.</td>
        </tr>
        <tr>
        <td>Elektrikli açma kapama mekanizmaları.</td>
        </tr>
        <tr>
        <td>Makine ve motorlar için silindir contaları. </td>
        </tr>
        ";
        $sinif8="<tr>
        <td>Değerli madenlerden olanlar dahil çatallar, kaşıklar, bıçaklar ve kesme, doğrama, soyma amaçlı elektrikli olmayan kesici mutfak aletleri.</td>
        </tr>
        <tr>
        <td>Kesici ve dürtücü silahlar. </td>
        </tr>
        <tr>
        <td><b>Güzellik amaçlı ve kişisel bakım için kullanılan bu sınıfa dahil aletler: tıraş, epilasyon, manikür, pedikür aletleri,  saç düzleştirme ve kıvırma amaçlı el aletleri, makaslar. </b></td>
        </tr>
        <tr>
        <td>Makine, cihaz ve taşıt onarımı, inşaat, ziraat, bahçecilik ve ormancılıkla ilgili elle çalışan (<b>elektrikli olmayan</b> ve motorsuz) aletler.</td>
        </tr>
        <tr>
        <td>Elektrikli-elektriksiz, buharlı ütüler.</td>
        </tr>
        ";
        $sinif9="<tr>
        <td><b>Bilim, denizcilik, topoğrafya, meteoroloji, sanayide ve laboratuvarda kullanım amaçlı olanlar dahil ölçme aletleri, cihazları: tıbbi amaçlı olmayan termometreler, barometreler, ampermetreler, voltmetreler, nem ölçerler, test cihazları, teleskoplar, periskoplar, pusulalar; taşıt  göstergeleri;  laboratuvarlarda kullanılan malzemeler: mikroskoplar, büyüteçler, deney malzeme ve cihazları.</b></td>
        </tr>
        <tr>
        <td><b>Ses ve görüntünün kaydı, nakli veya yeniden meydana getirilmesi (reprodüksiyonu)  için cihazlar: kameralar, fotoğraf makineleri, televizyonlar, videolar, cd-dvd kayıt ve oynatıcı cihazlar, mp3 çalar, bilgisayarlar, masa üstü-tablet bilgisayarlar, mikrofonlar, hoparlörler, kulaklıklar; haberleşme ve çoğaltma amaçlı cihazlar ve bilgisayar çevre donanımları: cep telefonları ve bunların kılıfları, sabit telefonlar, telefon santralleri, bilgisayar yazıcıları, tarayıcılar, fotokopi makineleri.</b></td>
        </tr>
        <tr>
        <td>Manyetik, optik kayıt taşıyıcılar ve bunlara kaydedilmiş bilgisayar programları ve yazılımları; bilgisayar ağları vasıtasıyla indirilebilen ve manyetik ve optik ortamlara kayıt edilebilen elektronik yayınlar; manyetik/optik okuyuculu kartlar.</td>
        </tr>
        <tr>
        <td>Antenler, uydu antenler, yükselticiler ve bunların parçaları.</td>
        </tr>
        <tr>
        <td>Bilet otomatları, nakit para çekme makineleri.</td>
        </tr>
        <tr>
        <td><b>Makine ve cihazların elektroniğinde kullanılan elemanlar: yarı iletkenler, elektronik devreler, entegreler, yongalar (çipler), diyotlar, transistörler, manyetik kafalar, saptırıcılar; elektronik kilitler, fotoseller, elektronik açma kapama mekanizmaları, algılayıcılar (sensörler).</b></td>
        </tr>
        <tr>
        <td>Birim zamandaki tüketim miktarını ölçen sayaçlar ve zaman ayarlayıcıları.</td>
        </tr>
        <tr>
        <td>Koruyucu giysiler, koruma ve can kurtarma amaçlı donanımlar.</td>
        </tr>
        <tr>
        <td>Gözlükler, güneş gözlükleri, lensler ve bunların kutuları, kılıfları, parçaları ve aksesuarları.</td>
        </tr>
        <tr>
        <td><b>Elektrik enerjisini iletim, dönüştürme, depolama kontrol cihazları ve araçları: fişler, buatlar, anahtarlar, şalterler, sigortalar, balastlar, starterler, elektrik panoları, rezistanslar, soketler, transformatörler, adaptörler, şarj cihazları, elektrikli ziller, elektrik, elektronikte kullanılan kablolar, piller, aküler.</b></td>
        </tr>
        <tr>
        <td>Ana fonksiyonu uyarı ve alarm olan cihazlar (taşıt alarmları hariç), elektrikli ziller.</b></td>
        </tr>
        <tr>
        <td>Trafikte kullanım amaçlı sinyalizasyon, işaretle bildirme cihazları ve araçları.</td>
        </tr>
        <tr>
        <td>Yangın söndürme amaçlı taşıtlar dahil yangın söndürme aletleri ve cihazları (yangın söndürme hortumları ve yangın söndürme vanaları dahil).</td>
        </tr>
        <tr>
        <td>Radarlar, denizaltı radarları (sonarlar), gece görüşü sağlayıcı veya arttırıcı aletler ve cihazlar.</td>
        </tr>
         <tr>
        <td>Dekoratif mıknatıslar.</td>
        </tr>
        <tr>
        <td>Metronomlar.</td>
        </tr>
        ";
        $sinif10="<tr>
        <td>Cerrahi, tıbbi, diş hekimliği ve veterinerlik için alet, cihaz ve mobilyalar.</td>
        </tr>
        <tr>
        <td>Yapay organlar ve protezler.</td>
        </tr>
        <tr>
        <td><b>Tıbbi ortopedik malzemeler: tıbbi korseler, ortopedik ayakkabılar, elastiki ve destekleyici bandajlar.</b></td>
        </tr>
        <tr>
        <td>Ameliyathane giysileri ve steril örtüler.</td>
        </tr>
        <tr>
        <td>Cinsel amaçlı aletler ve malzemeler.</td>
        </tr>
        <tr>
        <td>Prezervatifler (kondom/kaput).</td>
        </tr>
        <tr>
        <td>Biberonlar, biberon emzikleri, emzikler, bebekler için diş kaşıyıcılar.</td>
        </tr>
        ";
        $sinif11="<tr>
        <td>Aydınlatma cihazları (taşıtlar, iç ve dış mekanlar için aydınlatma armatürleri).</td>
        </tr>
        <tr>
        <td><b>Katı, sıvı, gaz yakıtlı ve elektrikli ısıtma amaçlı cihazlar: kombiler, boylerler, kaloriferler petekleri, eşanjörler, sobalar, kuzineler; güneş enerjisi kollektörleri.</b></td>
        </tr>
        <tr>
        <td><b>Buhar, gaz ve sis (duman) üreteçleri (jeneratörleri): buhar jeneratörleri (kazanları), asetilen jeneratörleri, oksijen jeneratörleri, nitrojen jeneratörleri.</b></td>
        </tr>
        <tr>
        <td>İklimlendirme ve havalandırma cihazları.</td>
        </tr>
        <tr>
        <td>Soğutucular ve dondurucular.</td>
        </tr>
        <tr>
        <td>Pişirme, kurulama ve kaynatmada kullanılan elektrikle ve gazla çalışan aletler, makineler ve cihazlar: fırınlar, elektrikli tencereler, elektrikli su kaynatıcıları, mangallar, barbeküler, elektrikli çamaşır kurutucuları, saç kurutucuları ve el kurutma cihazları. </td>
        </tr>
        <tr>
        <td><b>Sıhhi tesisat ürünleri: musluklar, duş takımları, klozet iç takımları, banyo-duş kabinleri, küvetler, klozetler, evyeler, lavabolar. </b></td>
        </tr>
        <tr>
        <td>Su yumuşatma cihazları, su arıtma cihazları, su arıtma tesisatı, atık arıtma tesisatı.</td>
        </tr>
        <tr>
        <td>Tıbbi amaçlı olmayan elektrikli alt yaygıları ve elektrikli battaniyeler, ısıtıcı yastıklar, elektrikli veya elektriksiz ayak ısıtıcıları, sıcak su torbaları (termoforlar).</td>
        </tr>
        <tr>
        <td>Akvaryumlar için filtreler ve filtre-motor kombinasyonları.</td>
        </tr>
        <tr>
        <td>Sanayi tipi pişirme, kurutma ve soğutma tesisatı.</td>
        </tr>
        <tr>
        <td>Pastörize ve sterilize edici makineler.</td>
        </tr>
        ";
        $sinif12="<tr>
        <td><b>Motorlu kara taşıtları (motosikletler, mobilet dahil) ve bu taşıtlar için motorlar, kavramalar ve transmisyon bağlantıları, transmisyon kayışları ve zincirleri, dişliler, frenler, fren disk ve balataları, şasiler, kaportalar, süspansiyonlar, darbe emiciler, şanzımanlar, direksiyonlar, jantlar.  </b></td>
        </tr>
        <tr>
        <td>Bisikletler ve bunların gövdeleri, gidonları, çamurlukları.</td>
        </tr>
        <tr>
        <td>Taşıt kasaları, damperli kasalar, traktör römorkları, frigorifik kasalar, römork bağlantıları.</td>
        </tr>
        <tr>
        <td>Taşıt koltukları, koltuklar için baş dayanakları, emniyetli çocuk koltukları, koltuk kılıfları, araç örtüleri (aracın şeklini almış), güneşlikler.</td>
        </tr>
        <tr>
        <td>Sinyaller ve yön sinyalleri için kollar, taşıt camları için silecekler, silecek kolları.</td>
        </tr>
        <tr>
        <td>Taşıtlar için iç ve dış lastikler, tubles lastikler, lastik tamir takımları, taşıt lastikleri için yamalar, kaynak yamalar, taşıt lastikleri için supaplar.</td>
        </tr>
        <tr>
        <td>Taşıt camları, emniyetli taşıt camları, taşıtlar için dikiz aynaları ve yan aynalar.</td>
        </tr>
        <tr>
        <td>Patinaj zincirleri.</td>
        </tr>
        <tr>
        <td>Taşıtlar için portbagajlar, bisiklet ve kayak taşıyıcıları, seleler.</td>
        </tr>
        <tr>
        <td>Lastik şişirme pompaları.</td>
        </tr>
        <tr>
        <td>Taşıtlar için hırsız alarmları, kornalar.</td>
        </tr>
        <tr>
        <td>Yolcular için emniyet kemerleri, havalı yastıklar.</td>
        </tr>
        <tr>
        <td>Bebek arabaları, tekerlekli sandalyeler, pusetler.</td>
        </tr>
        <tr>
        <td>El arabaları, pazar arabaları, tek veya çok tekerlekli el arabaları, market arabaları, ev eşyaları için tekerlekli taşıyıcılar.</td>
        </tr>
        <tr>
        <td>Raylı taşıtlar: Lokomotifler, trenler, tramvaylar, vagonlar, teleferikler, telesiyejler.</td>
        </tr>
        <tr>
        <td>Deniz taşıtları ve parçaları (motorları hariç).</td>
        </tr>
        <tr>
        <td>Hava taşıtları ve parçaları (motorları hariç). </td>
        </tr>
        ";
        $sinif13="<tr>
        <td>Ateşli, havalı, yaylı silahlar ile bunlara ait kılıf ve askı kayışları.</td>
        </tr>
        <tr>
        <td>Ağır silahlar, havanlar, roketler.</td>
        </tr>
        <tr>
        <td>Havai fişekler.</td>
        </tr>
        <tr>
        <td>Kişisel kullanım için koruyucu gazlar.</td>
        </tr>
        ";
        $sinif14="<tr>
        <td>Kuyumculuk eşyaları (taklitleri dahil); altınlar, mücevherler, kıymetli taşlar ve bunlardan mamul takılar, kol düğmeleri, kravat iğneleri ve heykeller, biblolar.</td>
        </tr>
        <tr>
        <td>Saatler ve zaman ölçme cihazları (kronometreler ve parçaları, saat kordonları dahil).</td>
        </tr>
        ";
        $sinif15="<tr>
        <td>Müzik aletleri ve kutuları.</td>
        </tr>
        ";
        $sinif16="<tr>
        <td>Kağıt, karton (mukavva); kağıt veya karton malzemeden mamul ambalajlama ve sarma malzemeleri, karton kutular; kağıttan yapılmış tek seferlik kullanıma mahsus ürünler (kırtasiye amaçlı ürünler hariç): kağıt havlular, tuvalet kağıtları, kağıt peçeteler.</td>
        </tr>
        <tr>
        <td>Plastik malzemeden mamul ambalajlama ve sarma malzemeleri.</td>
        </tr>
        <tr>
        <td>Matbaa ve ciltleme malzemeleri.</td>
        </tr>
        <tr>
        <td><b>Basılı yayınlar, basılı evrak: kitaplar, dergiler, gazeteler, faturalar, irsaliyeler, gelir makbuzları,  takvimler, posterler, fotoğraflar, afişler, tablolar, çıkartmalar, pullar.</b></td>
        </tr>
        <tr>
        <td><b>Kırtasiye, büro, eğitim-öğretim, yazım, çizim, resim ve sanatçılar için malzemeler (mobilyalar ve cihazlar hariç): kırtasiye tipi kağıt ürünler, yapıştırıcılar, kalemler, silgiler, kırtasiye tipi bantlar, el işi için karton, yazı kağıtları, kopyalama kağıtları, yazarkasa kağıt ruloları, çizim aletleri, kara tahtalar, resim boyaları.</b></td>
        </tr>
        <tr>
        <td>Büro makineleri.</td>
        </tr>
        <tr>
        <td>Badana ve boya işleri için fırçalar ve rulolar.</td>
        </tr>
        <tr>
        <td>Tespihler.</td>
        </tr>
        ";
        $sinif17="<tr>
        <td>Kauçuk, gütaperka, lastik, amyant (asbest), mika veya bunlardan mamul toz, levha, çubuk ve folyo halinde yarı mamul sentetik malzemeler.</td>
        </tr>
        <tr>
        <td><b>Yalıtım, dolgu ve tıkama malzemeleri: yalıtım amaçlı kullanılan boyalar, yalıtım için kumaşlar, yalıtım amaçlı bantlar, yalıtım için örtüler,  derz dolguları, contalar, o-ringler ( motor ve silindir contaları hariç). </b></td>
        </tr>
        <tr>
        <td>Lastikten, plastikten veya kauçuktan mamul bükülebilir borular, hortumlar (taşıtlar için kullanılanlar dahil), boru kılıf ve rakorları; tekstilden hortumlar, madeni olmayan boru kılıfları ve rakorları, hortum rakorları, taşıtlar için radyatör hortumları (yangın hortumları hariç).</td>
        </tr>
        ";
        $sinif18="<tr>
        <td>İşlenmiş veya işlenmemiş deriler ve postlar, yapay deriler, köseleler, astarlık deriler.</td>
        </tr>
        <tr>
        <td><b>Derilerden, deri taklitlerinden veya diğer malzemelerden mamul taşıma amaçlı başka sınıflarda yer almayan eşyalar: çantalar, cüzdanlar, deri veya kösele kutular ve sandıklar, anahtar muhafazaları, bavullar, valizler.</b></td>
        </tr>
        <tr>
        <td>Şemsiyeler, güneş şemsiyeleri, güneşlikler, bastonlar.</td>
        </tr>
        <tr>
        <td>Kırbaçlar, koşum takımları, eyerler, üzengi ve eyer kayışları.</td>
        </tr>
        ";
        $sinif19="<tr>
        <td><b>Bu sınıfa dahil biçimlendirilmemiş halde malzemeler: kum, çakıl, mıcır, asfalt, zift, çimento, kireç, alçı, sıva, beton, blok mermer. </b></td>
        </tr>
        <tr>
        <td><b>Beton, alçı, toprak, kil, taş, mermer, ahşap, plastik veya sentetik malzemelerden imal edilmiş ve şekil almış yapı/inşaat/yol yapımı ve benzer amaçlı malzemeler: metalden olmayan binalar/yapılar, yapı elemanları, direkler, bariyerler, tabii veya sentetik ısı ile yapıştırılabilen kaplamalar, çatılar için ziftli kartonlar, ziftli kaplamalar, ahşap ve sentetik malzemeden kapı ve pencereler.</b></td>
        </tr>
        <tr>
        <td>Yollar için metal, mekanik ve aydınlatmalı olmayan trafik işaretleri.</td>
        </tr>
        <tr>
        <td>Beton, taş veya mermerden yapılmış anıtlar, heykeller.</td>
        </tr>
        <tr>
        <td>İnşaatlar için cam ürünleri. </td>
        </tr>
        <tr>
        <td>Metalden olmayan prefabrik yüzme havuzları.</td>
        </tr>
        <tr>
        <td>Akvaryum kumları.</td>
        </tr>
        ";
        $sinif20="<tr>
        <td>Yapıldıkları maddelere ve malzemelere bakılmaksızın mobilyalar. </td>
        </tr>
        <tr>
        <td>Yatak şilteleri, yastıklar, tıbbi amaçlı olmayan havalı yataklar ve yastıklar, kampçılar için uyku tulumları, deniz yatakları.  </td>
        </tr>
        <tr>
        <td>Aynalar.</td>
        </tr>
        <tr>
        <td>Arı kovanları, suni petekler ve petek çıtaları.</td>
        </tr>
        <tr>
        <td>Bebekler için ana kucakları, parmaklıklı oyun parkları (iç mekanlar için), bebek beşikleri, yürüteçler.</td>
        </tr>
        <tr>
        <td>Ahşap veya sentetik malzemeden mamul panolar, resimler, tablolar için çerçeveler, kimlik kartları, künyeler, isimlikler, etiketler. </td>
        </tr>
        <tr>
        <td>Ahşap veya sentetik malzemeden mamul ambalaj, nakliye ve depolama amaçlı variller, fıçılar, bidonlar, hazneler (depolar), kutular, ambalaj kapları,  nakliye amaçlı konteynerler, sandıklar, taşıma paletleri, bunlarla birlikte kullanılan kapaklar.   </td>
        </tr>
        <tr>
        <td>Ahşap veya sentetik malzemelerden mamul hırdavat (nalburiye) eşyası, mobilya bağlantıları, açma kapama tertibatları.</td>
        </tr>
        <tr>
        <td><b>Tahta, mantar, kamış, bambu, hasır, boynuz, kemik, fildişi, balina kemiği, istiridye kabuğu, kehribar, sedef, lületaşı, balmumu, plastik veya alçıdan mamul bu sınıfa dahil süs ve dekorasyon eşyaları: biblolar, duvara asılan süsler, heykeller.</b></td>
        </tr>
        <tr>
        <td>Sepetler, balıkçı sepetleri. </td>
        </tr>
        <tr>
        <td>Ev hayvanları için kulübeler, yuvalar, yataklar.</td>
        </tr>
        <tr>
        <td>Ahşap veya sentetik malzemeden mamul portatif merdivenler, hareketli merdivenler.</td>
        </tr>
        <tr>
        <td>Bambu perdeler, stor perdeler (iç mekan), şerit perdeler, dekorasyon amaçlı boncuklu perdeler;  perde kopçaları,  perde halkaları, perde kancaları, perde çubukları.</td>
        </tr>
        <tr>
        <td>Araç tekerlekleri için metalden olmayan takozlar.</td>
        </tr>
        ";
        $sinif21="<tr>
        <td><b>Elektriksiz temizlik aletleri ve gereçleri: boya fırçaları hariç fırçalar, çelik talaşları, süngerler, çelik yünleri, üstüpüler, tekstilden mamul temizleme ve silme bezleri, bulaşık eldivenleri, elektrikli olmayan cilalama makineleri, halı süpürgeleri, sopalı yer paspasları. </b></td>
        </tr>
        <tr>
        <td>Diş fırçaları, elektrikli diş fırçaları, diş ipleri, tıraş fırçaları, saç fırçaları, taraklar.</td>
        </tr>
        <tr>
        <td><b>Değerli metalden olanlar da dahil olmak üzere, bu sınıfta yer alan ve elektrikle çalışmayan ev ve mutfak gereçleri (çatal, bıçak, kaşıklar hariç): yemek servis takımları, kap-kacak, şişe açacakları, saksılar, pipetler, elektriksiz pişirme aletleri.</b></td>
        </tr>
        <tr>
        <td>Ütü masaları ve kılıfları, çamaşır kurutmalıkları, elbise askıları.</td>
        </tr>
        <tr>
        <td><b>Ev hayvanları için kafesler, akvaryumlar, vivaryumlar, terraryumlar.</b></td>
        </tr>
        <tr>
        <td><b>Camdan, porselenden, seramikten, kilden süs ve dekorasyon eşyaları: heykeller, biblolar, vazolar.</b></td>
        </tr>
        <tr>
        <td><b>Fare kapanları, haşerat tuzakları, sinek ve haşeratı kovucu veya yok edici elektrikli cihazlar, sinek yakalayıcılar, sinek raketleri. </b></td>
        </tr>
        <tr>
        <td>Parfüm bekleri (yandığında koku yayan bekler), parfüm spreyleri ve vaporizatörleri (püskürteç), elektrikli-elektriksiz makyaj temizleme aletleri, pudra ponponları, tuvalet eşyaları için kutular.</td>
        </tr>
        <tr>
        <td>Püskürtmeli hortum başlıkları, sulama süzgeçleri için başlıklar, sulama aletleri, bahçe sulama süzgeçleri, musluklara takılan uçlar. </td>
        </tr>
        <tr>
        <td>İşlenmemiş cam, yarı işlenmiş cam, dekorasyon için cam mozaikler ve cam tozları (inşaat için olanlar hariç), cam yünleri (izolasyon ve tekstil amaçlı olmayan).</td>
        </tr>
        ";
        $sinif22="<tr>
        <td>Halatlar, ipler, ip merdivenler, hamaklar,  balık ağları.</td>
        </tr>
        <tr>
        <td>Çadırlar, tenteler, brandalar, yelkenler, araç örtüleri (araç şeklini almamış olanlar).</td>
        </tr>
        <tr>
        <td>Tekstilden mamul ambalaj torbaları.</td>
        </tr>
        <tr>
        <td>Kauçuk ve sentetik olmayan döşeme doldurma malzemeleri (yün, pamuk dahil). </td>
        </tr>
        <tr>
        <td>Tekstil amaçlı sentetik elyaflar, işlenmemiş büküm elyafları, cam elyaflar.</td>
        </tr>
        ";
        $sinif23="<tr>
        <td>Tekstil amaçlı büküm iplikleri; dikiş,  nakış ve örgü iplikleri, tireler, esnek iplikler.</td>
        </tr>
        ";
        $sinif24="<tr>
        <td>Dokunmuş veya dokunmamış kumaşlar.</td>
        </tr>
        <tr>
        <td><b>Ev tekstil ürünleri:</b> perdeler, yatak örtüleri, nevresimler, çarşaflar, yastık kılıfları, battaniyeler, yorganlar, havlular. </td>
        </tr>
        <tr>
        <td>Tekstilden bayraklar, flamalar, etiketler. </td>
        </tr>
        <tr>
        <td>Bebekler için kundak örtüleri.</td>
        </tr>
        ";
        $sinif25="<tr>
        <td><b>Koruyucu amaçlı olanlar hariç her türlü malzemeden yapılmış iç-dış giysiler, çoraplar, fularlar, şallar, bandanalar, eşarplar, kemerler.</b></td>
        </tr>
        <tr>
        <td><b>Ayak giysileri: ayakkabılar, terlikler, sandaletler. </b></td>
        </tr>
        <tr>
        <td><b>Baş giysileri: şapkalar, kasketler, bereler, takkeler, kepler.</b></td>
        </tr>
        ";
        $sinif26="<tr>
        <td>Danteller ve nakışlar (aplikeler), güpürler, fistolar, dar dokumalar, şeritler ve kurdeleler, ekstraforlar, fitiller, giysiler için kumaştan yapılmış hazır harfler ve rakamlar, armalar, rütbe işaretleri, vatkalar.</td>
        </tr>
        <tr>
        <td>Giysiler için düğmeler, kopçalar, halkalar, fermuarlar, ayakkabı ve kemer tokaları, perçinler, yapışkan bantlar, bağlar, toplu iğneler, iğneler, dikiş iğneleri, dikiş makinesi iğneleri, tığlar ve örgü şişleri, iğne kutuları ve iğnelikler.</td>
        </tr>
        <tr>
        <td>Yapma çiçekler, yapma meyveler.</td>
        </tr>
        <tr>
        <td><b>Saç tokaları, saçı bağlamak için halkalar, taçlar, değerli metalden olmayan saç süsleri, takma saçlar, postişler, elektrikli veya elektriksiz bigudiler.</b></td>
        </tr>
        ";
        $sinif27="<tr>
        <td>Halılar, kilimler, yolluklar.</td>
        </tr>
        <tr>
        <td>Seccadeler.</td>
        </tr>
        <tr>
        <td>Muşambalar, yapay çimen, döşemelik mantarlı muşamba (linolyum).</td>
        </tr>
        <tr>
        <td>Spor amaçlı minderler.</td>
        </tr>
        <tr>
        <td>Tekstilden olmayan duvar kaplamaları, duvar kağıtları.</td>
        </tr>
        ";
        $sinif28="<tr>
        <td>Oyunlar ve oyuncaklar. </td>
        </tr>
        <tr>
        <td>Salonda oynanan oyunlar; harici ekran ya da monitör ile bağlanıp oynanabilen oyunlar için aletler, makineler ve cihazlar (jetonla çalışanlar dahil). </td>
        </tr>
        <tr>
        <td>Hayvanlar için oyuncaklar.</td>
        </tr>
        <tr>
        <td>Çocuk bahçeleri, parklar ve oyun parkları için oyuncaklar.</td>
        </tr>
        <tr>
        <td><b>Bu sınıfa dahil jimnastik ve spor aletleri; olta takımları, yapay balık yemleri, avcılık ve balıkçılık için tuzaklar.</b></td>
        </tr>
        <tr>
        <td>Suni yılbaşı ağaçları ve bunlar için süsler, suni karlar,  çıngıraklar, parti ve benzeri eğlenceler için malzemeler,  kağıttan parti şapkaları.</td>
        </tr>
        ";
        $sinif29="<tr>
        <td>Et, balık, kümes ve av hayvanlarının etleri ile her nevi işlenmiş et ürünleri. </td>
        </tr>
        <tr>
        <td>Kuru bakliyat.</td>
        </tr>
        <tr>
        <td>Hazır çorbalar, bulyonlar. </td>
        </tr>
        <tr>
        <td>Zeytin, zeytin ezmeleri. </td>
        </tr>
        <tr>
        <td>Süt ve süt ürünleri (tereyağı dahil).</td>
        </tr>
        <tr>
        <td>Yenilebilir bitkisel yağlar.</td>
        </tr>
        <tr>
        <td>Kurutulmuş, konservelenmiş, dondurulmuş, pişirilmiş, tütsülenmiş, salamura edilmiş her türlü meyve ve sebzeler, salçalar. </td>
        </tr>
        <tr>
        <td>Kuru yemişler.</td>
        </tr>
        <tr>
        <td>Fındık ve fıstık ezmeleri, tahin. </td>
        </tr>
        <tr>
        <td>Yumurtalar, yumurta tozları.</td>
        </tr>
        <tr>
        <td>Patates cipsleri.</td>
        </tr>
        ";
        $sinif30="<tr>
        <td>Kahve, kakao; kahve veya kakao esaslı içecekler, çikolata esaslı içecekler.</td>
        </tr>
        <tr>
        <td>Makarnalar, mantılar, erişteler. </td>
        </tr>
        <tr>
        <td><b>Pastacılık ve fırıncılık mamulleri, tatlılar: Ekmek, simit, poğaça, pide, sandviç, katmer, börek, yaş pasta, baklava, kadayıf, şerbetli tatlılar, puding, muhallebi, kazandibi, sütlaç, keşkül.</b></td>
        </tr>
        <tr>
        <td>Bal, arı sütü, propolis.</td>
        </tr>
        <tr>
        <td>Yiyecekler için çeşni/lezzet vericiler, vanilya, baharatlar, domates sosları dahil olmak üzere  soslar.</td>
        </tr>
        <tr>
        <td>Mayalar, kabartma tozları.</td>
        </tr>
        <tr>
        <td>Her türlü un, irmikler, nişastalar.</td>
        </tr>
        <tr>
        <td>Toz şeker, kesme şeker, pudra şekeri.</td>
        </tr>
        <tr>
        <td>Çaylar, buzlu çaylar.</td>
        </tr>
        <tr>
        <td>Şekerlemeler, çikolatalar, bisküviler, krakerler, gofretler.</td>
        </tr>
        <tr>
        <td>Sakızlar</td>
        </tr>
        <tr>
        <td>Dondurmalar, yenilebilir buzlar.</td>
        </tr>
        <tr>
        <td>Tuz</td>
        </tr>
        <tr>
        <td><b>Hububattan  (tahıl) imal edilmiş çerezler, patlamış mısır, yulaf ezmeleri, mısır cipsleri, kahvaltılık hububat ürünleri, işlemden geçirilmiş buğday, arpa, yulaf, çavdar, pirinç.</b></td>
        </tr>
        <tr>
        <td>Pekmez.</td>
        </tr>
        ";
        $sinif31="<tr>
        <td><b>İşlenmemiş tarım ve bahçecilik ürünleri, tohumlar.</b></td>
        </tr>
        <tr>
        <td>Ormancılık ürünleri.</td>
        </tr>
        <tr>
        <td>Canlı hayvanlar, kuluçkalık yumurtalar, döllenmiş yumurtalar.</td>
        </tr>
        <tr>
        <td>Canlı ve kurutulmuş bitkiler ve otlar.</td>
        </tr>
        <tr>
        <td>Hayvan yemleri.</td>
        </tr>
        <tr>
        <td>Malt (insan tüketimi için olmayan).</td>
        </tr>
        ";
        $sinif32="<tr>
        <td>Biralar; bira yapımında kullanılan preparatlar. </td>
        </tr>
        <tr>
        <td>Maden suları, kaynak suları, sofra suları, sodalar.</td>
        </tr>
        <tr>
        <td>Sebze ve meyve suları, bunların konsantreleri ve özleri, meşrubatlar. </td>
        </tr>
        <tr>
        <td>Enerji içecekleri (alkolsüz).</td>
        </tr>
        ";
        $sinif33="<tr>
        <td><b>Alkollü içecekler (biralar hariç): Şaraplar, rakılar, viskiler, likörler, alkol içeren kokteyller.</b></td>
        </tr>
        ";
        $sinif34="<tr>
        <td><b>Tütün, çiğneme tütünleri, sigaralar, purolar.</b></td>
        </tr>
        <tr>
        <td>Değerli metalden olanlar da dahil olmak üzere, tütün içenlere mahsus malzemeler: pipolar, puro ve sigara ağızlıkları, küllükler, tütün kutuları, sigara sarmak için aletleri, sigara kağıtları, nargileler, çakmaktaşları, çakmaklar.</td>
        </tr>
        <tr>
        <td>Kibritler.</td>
        </tr>
        ";
        $sinif35="<tr>
        <td>Reklamcılık,  pazarlama ve halkla ilişkiler ile ilgili hizmetler, ticari ve reklam amaçlı sergi ve fuarların organizasyonu hizmetleri.</td>
        </tr>
        <tr>
        <td>Büro hizmetleri: sekreterlik hizmetleri, gazete aboneliği düzenleme hizmetleri, istatistiklerin derlenmesi, büro makinelerinin kiralanması hizmetleri, bilgisayar veri tabanlarındaki bilginin sistematik hale getirilmesi, telefon cevaplama hizmetleri. </td>
        </tr>
        <tr>
        <td>İş yönetimi, idaresi ve bu konular ile ilgili danışmanlık, muhasebe ve mali müşavirlik hizmetleri, personel işe yerleştirme, işe alma, personel seçimi, personel temini hizmetleri, ithalat-ihracat acente hizmetleri, geçici personel görevlendirme ( başkası adına fatura yatırma, vergi yatırma, trafik işlemleri gibi iş takibi) hizmetleri.</td>
        </tr>
        <tr>
        <td>Açık artırmaların düzenlenmesi ve gerçekleştirilmesi hizmetleri.</td>
        </tr>
        <tr>
        <td>Müşterilerin malları elverişli bir şekilde görmesi ve satın alması için malların* bir araya getirilmesi hizmetleri (belirtilen hizmetler perakende, toptan satış mağazaları, elektronik ortamlar, katalog ve benzeri diğer yöntemler ile sağlanabilir).
            * Bu kısımda mal veya mal grubu belirtiniz.
        </td>
        </tr>
        ";
        $sinif36="<tr>
        <td>Sigorta hizmetleri. </td>
        </tr>
        <tr>
        <td>Finansal ve parasal hizmetler.</td>
        </tr>
        <tr>
        <td>Gayrimenkul komisyonculuğu, müşavirliği ve idaresi hizmetleri. </td>
        </tr>
        <tr>
        <td>Gümrük müşavirliği hizmetleri.</td>
        </tr>";
        $sinif37="<tr>
        <td>İnşaat hizmetleri, inşaat araç – gereçlerinin ve iş makinelerinin kiralanması hizmetleri.</td>
        </tr>
        <tr>
        <td>Temizlik hizmetleri; dezenfeksiyon hizmetleri; haşere ilaçlama hizmetleri; temizlik araçları ve makinelerinin kiralanması hizmetleri.</td>
        </tr>
        <tr>
        <td>Kara araçları servis istasyonu hizmetleri (bakım, tamir ve akaryakıt dolumu).</td>
        </tr>
        <tr>
        <td>Deniz araçlarının bakımı ve tamiri hizmetleri; gemi inşaatı hizmetleri.</td>
        </tr>
        <tr>
        <td>Hava taşıtlarının bakım ve tamiri hizmetleri.</td>
        </tr>
        <tr>
        <td>Mobilyalara ilişkin döşeme, tamir, restorasyon hizmetleri.</td>
        </tr>
        <tr>
        <td>Isıtma, havalandırma ve su tesisatının kurulması (tesis edilmesi), bakımı ve tamiri hizmetleri.</td>
        </tr>
        <tr>
        <td>Giysilerin temizliği, bakımı ve tamiri hizmetleri.</td>
        </tr>
        <tr>
        <td>Sınai makinelerin ve cihazların, büro makinelerinin ve cihazlarının, haberleşme cihazlarının, elektrikli ve elektronik cihazların tesisi, bakımı ve tamiri hizmetleri.</td>
        </tr>
        <tr>
        <td>Asansör tamiri ve bakımı hizmetleri. </td>
        </tr>
        <tr>
        <td>Saat tamiri hizmetleri.</td>
        </tr>
        <tr>
        <td>Madencilik, maden çıkarma hizmetleri. </td>
        </tr>
        <tr>
        <td>Ayakkabı, çanta, kemer tamiri hizmetleri.</td>
        </tr>
        ";
        $sinif38="<tr>
        <td>Radyo ve televizyon yayın hizmetleri.</td>
        </tr>
        <tr>
        <td>Haberleşme hizmetleri (internet servisi sağlama hizmetleri dahil).</td>
        </tr>
        <tr>
        <td>Haber ajansı hizmetleri.</td>
        </tr>";
        $sinif39="<tr>
        <td>Kara, deniz ve hava taşımacılığı hizmetleri ve kara, deniz ve hava taşıtlarının kiralanması hizmetleri, tur düzenleme, seyahat için yer ayarlama, seyahat ile ilgili bilet sağlama, kurye hizmetleri.</td>
        </tr>
        <tr>
        <td>Araba parkları hizmetleri, garaj kiralama hizmetleri.</td>
        </tr>
        <tr>
        <td>Tekne barındırma hizmetleri. </td>
        </tr>
        <tr>
        <td>Boru hattı ile taşıma hizmetleri.</td>
        </tr>
        <tr>
        <td>Elektrik dağıtım hizmetleri.</td>
        </tr>
        <tr>
        <td>Su temin hizmetleri. </td>
        </tr>
        <tr>
        <td>Taşıt ve malları kurtarma hizmetleri.</td>
        </tr>
        <tr>
        <td>Malların depolanması, paketlenmesi ve sandıklanması hizmetleri.</td>
        </tr>
        <tr>
        <td>Çöplerin depolanması ve taşınması hizmetleri, atıkların toplanması ve taşınması hizmetleri.</td>
        </tr>
        ";
        $sinif40="<tr>
        <td></td>
        </tr>
        <tr>
        <td>Adi metallerin işleme hizmetleri.</td>
        </tr>
        <tr>
        <td>Değerli metallerin işlenmesi hizmetleri. </td>
        </tr>
        <tr>
        <td>Fotografik ve sinematografik ürünlerin işlenmesi hizmetleri, banyo, baskı ve foto gravür hizmetleri.</td>
        </tr>
        <tr>
        <td>Gıdaların işlenmesi hizmetleri.</td>
        </tr>
        <tr>
        <td>Hayvan kesim hizmetleri.</td>
        </tr>
        <tr>
        <td>Deri ve kürk işleme hizmetleri. </td>
        </tr>
        <tr>
        <td>Saraçlık hizmetleri.</td>
        </tr>
        <tr>
        <td>Kumaş işleme hizmetleri, yün işleme hizmetleri.</td>
        </tr>
        <tr>
        <td>Terzilik hizmetleri, nakış işleme hizmetleri. </td>
        </tr>
        <tr>
        <td>Ahşap ve kereste işleme hizmetleri.</td>
        </tr>
        <tr>
        <td>Sanat eserlerinin çerçevelenmesi hizmetleri.</td>
        </tr>
        <tr>
        <td>Sıvı, kimyasal madde, gaz, hava işleme hizmetleri. </td>
        </tr>
        <tr>
        <td>Sıvı, kimyasal madde, gaz, hava işleme hizmetleri. </td>
        </tr>
        <tr>
        <td>Cam ve optik cam işleme hizmetleri. </td>
        </tr>
        <tr>
        <td>Malzemelerin montajı (üçüncü şahıslar adına) hizmetleri.</td>
        </tr>
        <tr>
        <td>Diş teknisyenliği (döküm) hizmetleri.</td>
        </tr>
        <tr>
        <td>Çömlekçilik hizmetleri.</td>
        </tr>
        <tr>
        <td>Enerji üretimi hizmetleri, jeneratörlerin kiralanması hizmetleri.</td>
        </tr>
        <tr>
        <td>Kağıdın işlenmesi.</td>
        </tr>
        <tr>
        <td>Baskı hizmetleri, ciltçilik hizmetleri. </td>
        </tr>
        <tr>
        <td>Plastik işleme hizmetleri.</td>
        </tr>
        ";
        $sinif41="<tr>
        <td>Eğitim ve öğretim hizmetleri.</td>
        </tr>
        <tr>
        <td>Sempozyum, konferans, kongre ve seminer düzenleme, idare hizmetleri.</td>
        </tr>
        <tr>
        <td>Spor, kültür ve eğlence hizmetleri (sinema, spor karşılaşmaları, tiyatro, müze, konser gibi kültür ve eğlence etkinlikleri için bilet sağlama hizmetleri dahil). </td>
        </tr>
        <tr>
        <td>Dergi, kitap, gazete v.b.gibi yayınların basıma hazır hale getirilmesi, okuyucuya ulaştırılmasına ilişkin hizmetler (global iletişim ağları vasıtasıyla anılan hizmetlerin sağlanması da dahil).</td>
        </tr>
        <tr>
        <td>Film, televizyon ve radyo programları yapım hizmetleri. </td>
        </tr>
        <tr>
        <td>Haber muhabirliği hizmetleri, foto-muhabirliği hizmetleri.</td>
        </tr>
        <tr>
        <td>Fotoğrafçılık hizmetleri.</td>
        </tr>
        <tr>
        <td>Tercüme hizmetleri.</td>
        </tr>
        ";
        $sinif42="
        <tr>
        <td>Bilimsel ve sınai inceleme, araştırma hizmetleri; mühendislik hizmetleri, mühendislik ve mimari tasarım hizmetleri, kalite ve standart belgelendirme amaçlı mal/hizmetlerin test edilmesi. </td>
        </tr>
        <tr>
        <td>Bilgisayar hizmetleri: bilgisayar programlama, bilgisayarı virüse karşı koruma,  bilgisayar sistem tasarımı, başkaları adına web sitelerinin tasarlanması, bakımı ve güncelleştirilmesi, yazılım tasarımı, kiralanması ve güncelleştirilmesi, internet arama motoru sağlama, hosting, bilgisayar donanımları alanında danışmanlık, bilgisayar donanımlarının kiralanması hizmetleri. </td>
        </tr>
        <tr>
        <td>Bu sınıfa dahil olup mühendislik, mimarlık, bilgisayar hizmetleri kapsamına girmeyen her türlü tasarım hizmetleri; grafik sanat tasarım hizmetleri.</td>
        </tr>
        <tr>
        <td>Sanat eserleri orijinallik onay hizmetleri.</td>
        </tr>
        ";
        $sinif43="
        <tr>
        <td>Yiyecek ve içecek sağlanması hizmetleri.</td>
        </tr>
        <tr>
        <td>Geçici konaklama hizmetleri.</td>
        </tr>
        <tr>
        <td>Gündüz bakımı (kreş) hizmetleri.</td>
        </tr>
        <tr>
        <td>Hayvanlar için geçici barınma sağlanması  hizmetleri.</td>
        </tr>
        ";
        $sinif44="
        <tr>
        <td>Tıbbi hizmetler. </td>
        </tr>
        <tr>
        <td>Güzellik bakımı hizmetleri. </td>
        </tr>
        <tr>
        <td>Veterinerlik ve hayvan üretme, besicilik, nalbantlık ile ilgili hizmetler.</td>
        </tr>
        <tr>
        <td>Tarım, bahçecilik ve ormancılıkla ile ilgili hizmetler.</td>
        </tr>
        <tr>
        <td>İşyeri ve personel sağlığı ile ilgili danışmanlık hizmetleri. </td>
        </tr>
        ";
        $sinif45="
        <tr>
        <td>Hukuki hizmetler (sınai ve fikri mülkiyet hakları konusunda danışmanlık hizmetleri dahil).</td>
        </tr>
        <tr>
        <td>Güvenlik hizmetleri.</td>
        </tr>
        <tr>
        <td>Evlendirme büroları hizmetleri. </td>
        </tr>
        <tr>
        <td>Cenaze hizmetleri. </td>
        </tr>
        <tr>
        <td>Giysi kiralama hizmetleri.</td>
        </tr>
        <tr>
        <td>Yangın söndürme hizmetleri. </td>
        </tr>
        <tr>
        <td>Refakat etme hizmetleri. </td>
        </tr>
        <tr>
        <td>İş güvenliği konularında danışmanlık hizmetleri.</td>
        </tr>
        ";




        DB::table('sinifclass')->insert(
            ([
                ['sinif' => '1. SINIF','content' => $sinif1],
                ['sinif' => '2. SINIF','content' => $sinif2],
                ['sinif' => '3. SINIF','content' => $sinif3],
                ['sinif' => '4. SINIF','content' => $sinif4],
                ['sinif' => '5. SINIF','content' => $sinif5],
                ['sinif' => '6. SINIF','content' => $sinif6],
                ['sinif' => '7. SINIF','content' => $sinif7],
                ['sinif' => '8. SINIF','content' => $sinif8],
                ['sinif' => '9. SINIF','content' => $sinif9],
                ['sinif' => '10. SINIF','content' => $sinif10],
                ['sinif' => '11. SINIF','content' => $sinif11],
                ['sinif' => '12. SINIF','content' => $sinif12],
                ['sinif' => '13. SINIF','content' => $sinif13],
                ['sinif' => '14. SINIF','content' => $sinif14],
                ['sinif' => '15. SINIF','content' => $sinif15],
                ['sinif' => '16. SINIF','content' => $sinif16],
                ['sinif' => '17. SINIF','content' => $sinif17],
                ['sinif' => '18. SINIF','content' => $sinif18],
                ['sinif' => '19. SINIF','content' => $sinif19],
                ['sinif' => '20. SINIF','content' => $sinif20],
                ['sinif' => '21. SINIF','content' => $sinif21],
                ['sinif' => '22. SINIF','content' => $sinif22],
                ['sinif' => '23. SINIF','content' => $sinif23],
                ['sinif' => '24. SINIF','content' => $sinif24],
                ['sinif' => '25. SINIF','content' => $sinif25],
                ['sinif' => '26. SINIF','content' => $sinif26],
                ['sinif' => '27. SINIF','content' => $sinif27],
                ['sinif' => '28. SINIF','content' => $sinif28],
                ['sinif' => '29. SINIF','content' => $sinif29],
                ['sinif' => '30. SINIF','content' => $sinif30],
                ['sinif' => '31. SINIF','content' => $sinif31],
                ['sinif' => '32. SINIF','content' => $sinif32],
                ['sinif' => '33. SINIF','content' => $sinif33],
                ['sinif' => '34. SINIF','content' => $sinif34],
                ['sinif' => '35. SINIF','content' => $sinif35],
                ['sinif' => '36. SINIF','content' => $sinif36],
                ['sinif' => '37. SINIF','content' => $sinif37],
                ['sinif' => '38. SINIF','content' => $sinif38],
                ['sinif' => '39. SINIF','content' => $sinif39],
                ['sinif' => '40. SINIF','content' => $sinif40],
                ['sinif' => '41. SINIF','content' => $sinif41],
                ['sinif' => '42. SINIF','content' => $sinif42],
                ['sinif' => '43. SINIF','content' => $sinif43],
                ['sinif' => '44. SINIF','content' => $sinif44],
                ['sinif' => '45. SINIF','content' => $sinif45],

            ])
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinifclass');
    }
};
