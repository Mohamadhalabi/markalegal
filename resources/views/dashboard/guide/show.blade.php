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
                                    <img src="{{ url("images/".$guide->image) }}" class="img-thumbnail" style="max-width:700px" alt="{{ $guide->title }}">
                                    <h2>Title:{{ $guide->title }}</h2>
                                    <h6>Description:{{ $guide->description }}</h6>
                                    <p>{!! $guide->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
        </div>
   </div>
</div>
@endsection
