@extends('dashboard')
@section('content')
<div class="container">
    <div class="row row-content">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Date : {{ $contact->created_at }}</p>
                                    <p>Name : {{ $contact->name }}</p>
                                    <p>Email : {{ $contact->email }}</p>
                                    <p>Form Type : {{ $contact->type }}</p>
                                    <br>
                                    <p>Message</p>
                                    <textarea cols="100%" rows="10" disabled>{{ $contact->message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
        </div>
   </div>
</div>
@endsection
