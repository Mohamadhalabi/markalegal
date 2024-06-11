<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('dashboard.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'form_type' => 'required|in:contact,query',
        ]);
        if($request->form_type == 'contact'){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'message' => 'required|string|max:255',
            ]);
        }else{
            $this->validate($request, [
                'marka' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
            ]);
        }


        $mj = Mailjet::getClient();
        $contact = new Contact;
        if($request->form_type == "query"){
            $contact->form_type = $request->form_type;
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->marka = $request->marka;
            $subject = "[Marka Legal] Yeni Marka Talebi";
            $textPart = "Sorgu formu üzerinden yeni marka talebi alınmıştır.\n\n".$request->marka."\n".$request->name."\n".$request->phone."\nMarka Legal - Email Servisi";
        }
        else{
            $contact->form_type = $request->form_type;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->type= $request->type;
            $subject = "[Marka Legal] Yeni Mesaj Alındı";
            $textPart = "İletişim formu üzerinden yeni mesaj alınmıştır.\n\n".$request->name."\n".$request->email."\n".$request->type."\n".$request->message."\nSaygılarımızla,\nMarka Legal - Email Servisi";
        }
        $contact->save();

        // Mail content
        $body = [
            'FromEmail' => "info@marka.legal",
            'FromName' => "Marka Legal",
            'Subject' => $subject,
            'Text-part' => $textPart,
            'Recipients' => [
                [
                    'Email' => "info@proustpatent.com"
                ],
            ]
        ];
        $response =  $mj->post(Resources::$Email, ['body' => $body]);
        $response["status"] = "success";
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
