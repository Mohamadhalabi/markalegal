@extends('dashboard')
@section('content')
<div class="container">
    <div class="row row-content">
        <div class="col-md-12">
            <h2>Edit guide</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form action="{{ route('guide.update', $guide) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old("title", $guide->title) }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old("description", $guide->description) }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="ckeditor form-control" name="content">{{ old("content", $guide->content) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                </div>
                @if ($guide->image)
                <div class="form-group">
                    <a href="{{ url('images/'.$guide->image) }}" target="_blank">Show default image</a>
                </div>
                @endif
                  <div class="form-group">
                      <label for="homeimage">Home Image</label>
                      <input type="file" class="form-control" id="homeimage" name="homeimage" placeholder="homeimage">
                  </div>
                  @if ($guide->homeimage)
                      <div class="form-group">
                          <a href="{{ url('images/homeimages/'.$guide->homeimage) }}" target="_blank">Show default image</a>
                      </div>
                  @endif
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
   </div>
</div>
@endsection
