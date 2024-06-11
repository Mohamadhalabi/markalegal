@extends('dashboard')
@section('content')
<div class="container">
    <div class="row row-content">
        <div class="col-md-12">
            <h2>Edit Price Item</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form action="{{ route('price.update', $price) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Item</label>
                    <input type="text" class="form-control" id="title" name="item" placeholder="Item" value="{{ old("item", $price->item) }}">
                </div>
                <div class="form-group">
                    <label for="title">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ old("price", $price->price) }}">
                </div>
                <div class="form-group">
                    <label for="title">Currency</label>
                    <input type="text" class="form-control" id="currency" name="currency" placeholder="Currency" value="{{ old("currency", $price->currency) }}">
                </div>
                <div class="form-group">
                    <label for="title">Year</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="Year" value="{{ old("year", $price->year) }}">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>              
        </div>
   </div>
</div>
@endsection
