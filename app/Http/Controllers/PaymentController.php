<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Iyzipay\Model\CheckoutFormInitialize;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;
class PaymentController extends Controller
{
    public function index()
    {
        $post = Post::select('price','id')->orderBy('id','desc')->first()->price;
        $name = Post::select('contact_name','id')->orderBy('id','desc')->first()->contact_name;
        $phone = Post::select('contact_telephone','id')->orderBy('id','desc')->first()->contact_telephone;
        $phoneNumber = "+90".$phone;

        $identity= Post::select('tckn','id')->orderBy('id','desc')->first()->tckn;
        if($identity == null){
            $identity= Post::select('vergi_no','id')->orderBy('id','desc')->first()->vergi_no;
        }else{
            $identity= Post::select('tckn','id')->orderBy('id','desc')->first()->tckn;
        }
        $id = Post::select('id')->orderBy('id','desc')->first()->id;
        $email = Post::select('contact_email','id')->orderBy('id','desc')->first()->contact_email;
        $adress= Post::select('address','id')->orderBy('id','desc')->first()->address;

        $options = new \Iyzipay\Options();
        $options->setApiKey("krD90pQJHpniLuvL9aRlIHPFNflg1rrB");
        $options->setSecretKey("bVUIHXA1b36cPi8HTmhE4Fw3ofsRi4H3");
        $options->setBaseUrl("https://api.iyzipay.com");

        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("$post");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        $request->setCallbackUrl(route('iyzico.callback'));


        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("$id");
        $buyer->setName("$name");
        $buyer->setSurname("$name");
        $buyer->setGsmNumber("$phoneNumber");
        $buyer->setEmail("$email");
        $buyer->setIdentityNumber("$identity");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("$adress");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");

        $request->setBuyer($buyer);
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;

        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");

        $basketItems[1] = $secondBasketItem;
        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);

        $checkoutFormInitialize = CheckoutFormInitialize::create($request, $options);
        $paymentinput = $checkoutFormInitialize->getCheckoutFormContent();

        $token = $checkoutFormInitialize->getToken();
        DB::table('orders')->where('id',$id)->update(['token'=>$token]);

        return view('iyzico-form',compact('paymentinput'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|min:3',
            'number_of_classes' => 'required|min:1',
            'contact_name' => 'required|min:3',
            'contact_email' => 'required|email',
            'contact_telephone' => 'required|numeric|min:9',
            'buyer_name' => 'required_without:unvan',
            'unvan' => 'required_without:buyer_name|',
            'vergi_no' => 'required_without:tckn',
            'tckn' => 'required_without:vergi_no',
            'email' => 'required|email',
            'telephone' => 'required|numeric|min:9',
            'address' => 'required|min:10',
            'price' => 'required',
        ]);

        DB::table('orders')->insert($validateData);
    }


    public function callback(){
        $options = new \Iyzipay\Options();
        $options->setApiKey("krD90pQJHpniLuvL9aRlIHPFNflg1rrB");
        $options->setSecretKey("bVUIHXA1b36cPi8HTmhE4Fw3ofsRi4H3");
        $options->setBaseUrl("https://api.iyzipay.com");

        $token = Post::select('token', 'id')->orderBy('id', 'desc')->first()->token;
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("$token");
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);
        $id = Post::select('id')->orderBy('id','desc')->first()->id;

        if($checkoutForm->getPaymentStatus() == 'SUCCESS') {
            DB::table('orders')->where('id',$id)->update(['status'=>'Successful']);


            return redirect()->route('iyzico.success');
        }
        else{
            DB::table('orders')->where('id',$id)->update(['status'=>'Payment Failed']);

            return redirect()->route('iyzico.failed');
        }
    }

    public function success(){
        $name = Post::select('contact_name', 'id')->orderBy('id', 'desc')->first()->contact_name;
        $marka = Post::select('brand_name', 'id')->orderBy('id', 'desc')->first()->brand_name;
        $contact_email = Post::select('contact_email', 'id')->orderBy('id', 'desc')->first()->contact_email;
        $classes = Post::select('number_of_classes', 'id')->orderBy('id', 'desc')->first()->number_of_classes;
        $identity= Post::select('tckn','id')->orderBy('id','desc')->first()->tckn;
        if($identity == null){
            $identity= Post::select('vergi_no','id')->orderBy('id','desc')->first()->vergi_no;
        }else{
            $identity= Post::select('tckn','id')->orderBy('id','desc')->first()->tckn;
        }
        $email = Post::select('email', 'id')->orderBy('id', 'desc')->first()->emil;
        $phone = Post::select('telephone', 'id')->orderBy('id', 'desc')->first()->telephone;
        $contact_name = Post::select('contact_name', 'id')->orderBy('id', 'desc')->first()->contact_name;
        $contact_telephone = Post::select('contact_telephone', 'id')->orderBy('id', 'desc')->first()->contact_telephone;
        $adress = Post::select('address', 'id')->orderBy('id', 'desc')->first()->address;
        $status = Post::select('status', 'id')->orderBy('id', 'desc')->first()->status;

        $BuyerEmail = Mailjet::getClient();
        $subject = "Marka Başvurusu Talebiniz Alındı";
        $textPart = "Sayın $name,\n"."Marka başvurusu talebiniz alınmıştır. Marka uzmanımız sizle en kısa süre içerisinde iletişime geçecektir. Teşekkür ederiz."."\nMarka Legal - Email Servisi";
        $body = [
            'FromEmail' => "info@marka.legal",
            'FromName' => "Marka Legal",
            'Subject' => $subject,
            'Text-part' => $textPart,
            'Recipients' => [
                [
                    'Email' => $contact_email
                ],
            ]
        ];
        $response =  $BuyerEmail->post(Resources::$Email, ['body' => $body]);
        $response["buyer_email"] = "success";


        $AdminEmail = Mailjet::getClient();
        $subject = "[Marka Legal] Yeni marka başvurusu ödemesi";
        $textPart = "Ödeme formu üzerinden yeni marka başvurusu ödemesi alınmıştır:,\n".$marka." ".$classes."\n".$name." ".$identity." ".$email." ".$phone."\n".$contact_name." ".$contact_email." ".$contact_telephone." ".$adress."\n".$status."\n"."Saygılarımızla,"."\n"."Marka Legal Ekibi - Email Servisi";
        $body = [
            'FromEmail' => "info@marka.legal",
            'FromName' => "Marka Legal",
            'Subject' => $subject,
            'Text-part' => $textPart,
            'Recipients' => [
                [
                    'Email' => 'info@proustpatent.com'
                ],
            ]
        ];
        $response =  $AdminEmail->post(Resources::$Email, ['body' => $body]);
        $response["admin_email"] = "success";

        return view('successfulOrder',compact('name','marka'));
    }

    public function failed (){
        return view('FailedPayment');
    }


}
