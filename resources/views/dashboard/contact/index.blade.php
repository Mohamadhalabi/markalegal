@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row row-content">
            <div class="col-md-12">
                <h2>Contact</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Form Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email/Marka Name</th>
                                <th scope="col">Phone/Message</th>
                                <th scope="col">Request Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $item)
                                <tr @if($item->form_type == 'query') class='table-active' @endif>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->form_type == 'query' ? 'Query Form' : 'Contact Form' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if($item->form_type == 'query')
                                    <td>{{ $item->marka }}</td>
                                    <td>{{ $item->phone }}</td>
                                    @else
                                    <td>{{ $item->email }}</td>
                                    <td><a href="{{ route('contact.show',$item) }}">Show Message</a></td>
                                    @endif
                                    <td>{{ $item->type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $contacts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


