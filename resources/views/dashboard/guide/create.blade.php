@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row row-content">
            <div class="col-md-12">
                <h2>Create new guide</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('guide.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                            value="{{ old('title') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="Description" value="{{ old('description') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="ckeditor form-control" name="content">{{ old('content') }}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="homeimage">Home Image</label>
                        <input type="file" class="form-control" id="homeimage" name="homeimage">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
