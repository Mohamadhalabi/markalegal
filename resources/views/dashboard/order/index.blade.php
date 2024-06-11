@extends('dashboard')
@section('content')
    <div class="">
        <div class="row row-content">
            <div class="col-md-12">
                <h2>Orders</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">No of Classes</th>
                            <th scope="col">Contact name</th>
                            <th scope="col">Contact email</th>
                            <th scope="col">Contact telephone</th>
                            <th scope="col">Customer name/Ünvan</th>
                            <th scope="col">Tckn/Vergi no</th>
                            <th scope="col">Price</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{$order->brand_name}}</td>
                                <td>{{$order->number_of_classes}}</td>
                                <td>{{$order->contact_name}}</td>
                                <td>{{$order->contact_email}}</td>
                                <td>{{$order->contact_telephone}}</td>
                                <td>{{$order->buyer_name}} {{$order->unvan}}</td>
                                <td>{{$order->tckn}} {{$order->vergi_no}}</td>
                                <td>{{$order->price}} ₺</td>
                                <td>{{$order->address}} ₺</td>
                                <td>{{$order->created_at}}</td>
                                <td style="font-weight: bold">{{$order->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    td, thead{
        text-align: center;
        font-size: 20px;
    }
    table, h2{
        max-width: 80%;
        margin: auto;
    }
    *{
        overflow: hidden;
    }
</style>
