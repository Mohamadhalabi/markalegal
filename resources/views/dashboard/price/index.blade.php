@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row row-content">
            <div class="col-md-12">
                <h2>Contact</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Year</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->item }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->currency }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td><a href="{{ route('price.edit',$item) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
