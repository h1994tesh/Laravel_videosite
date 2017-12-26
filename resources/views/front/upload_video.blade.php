@extends('front.master')
@section('title','Upload Video')
@section('content')
<h2>Upload Video</h2>
<form method="post" enctype="multipart/form-data">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="nm">Video Category</label><br/>
        <select class="custom-select" name="v_cat" id="v_cat">
            <option value="">Select Category</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="form-group">
        <label for="v_title">Video Title</label>
        <input type="text" class="form-control" name="v_title" id="v_title">
    </div>
    <div class="form-group">
        <label for="v_desc">Video Description</label>
        <textarea class="form-control" id="v_desc" name="v_desc" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="v_thumb">Video Thumbnail</label>
        <input type="file" class="form-control-file" accept="image/*" id="v_thumb" name="v_thumb">
    </div>

    <div class="form-group">
        <label for="v_video">Upload Video</label>
        <input type="file" class="form-control-file" accept="video/*" id="v_video" name="v_video">
    </div>
<br/>
    <button type="submit" class="btn btn-primary">Upload Video</button>
</form>
@endsection

