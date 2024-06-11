@extends('dashboard')
@section('content')
    <div class="">
        <div class="row row-content">
            <div class="col-md-12">
                <h2>Guides</h2>
                <a href="{{ route('guide.create') }}" class="btn btn-primary col-md-1" style="max-width: 100%;margin-left: 10%">Create new guide</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Last Update</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guides as $guide)
                                <tr>
                                    <th scope="row">{{ $guide->id }}</th>
                                    <td>{{ $guide->title }}</td>
                                    <td>{{ $guide->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('guide.show', $guide->id) }}" class="btn text-success">Show</a>
                                        <a href="{{ route('guide.edit', $guide->id) }}" class="btn text-primary">Edit</a>
                                        <button type="button" class="btn text-danger" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $guide->id }}">
                                            Delete this guide
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $guide->id }}" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Are you sure?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this guide?
                                                        <p>--><strong>{{ $guide->title }}</strong></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('guide.destroy', $guide) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn text-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $guides->links() !!}
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
    a.btn {

    }

    *{
        overflow: hidden;
    }

</style>
