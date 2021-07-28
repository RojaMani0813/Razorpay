@extends('layouts.main')

@section('content')
        <form method="post" action="{{ route('store-movie') }}">
            <h3 class="text-center">Add new Course</h3><br>
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="movieName" class="col-sm-2 col-form-label">Name*</label>
                <div class="col-sm-10">
                    <input name="name" type="text" id="movieName" class="form-control" placeholder="Movie name...">
                </div>
            </div>
            <div class="form-group row">
                <label for="movieYear" class="col-sm-2 col-form-label">Amount*</label>
                <div class="col-sm-10">
                    <input name="amount" class="form-control" id="movieYear" placeholder="Year of publishing">
                </div>
            </div>
            <div class="form-group row">
                <label for="movieDescription" class="col-sm-4 col-form-label">Description*</label>
                <div class="col-sm-12">
                    <textarea name="description" class="form-control" id="movieDescription" placeholder="Short description of movie"></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="movieImage" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input name="image" class="form-control" id="movieImage" placeholder="Link to image">
                </div>
            </div>
            <div class="text-center">
                <small>Fields marked with * are required</small><br><br>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
@endsection