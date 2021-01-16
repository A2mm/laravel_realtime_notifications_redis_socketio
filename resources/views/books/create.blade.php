@extends('adminlte::page')
@section('title', 'Add New Book')
@section('content_header')
    <h1>Add New Book</h1>
@stop
@section('content')
  <div class="content">
  <div class="container-fluid">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
  
    <form action="{{route('books.save')}}" method="post" enctype="multipart/form-data ">
                {{ csrf_field() }}


                                {{-- print success message --}}
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="title"> Book Title <span class="text-danger"> * </span>  </label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Book Title" value="{{ old('title') }}">
                                    {!! $errors->first('title', '<small class="text-danger">:message </small>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="description"> Description <span class="text-danger"> * </span>  </label>
                                    <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{ old('description') }}">
                                     {!! $errors->first('description', '<small class="text-danger">:message </small>') !!}
                                </div>

                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success"> Save </button>
                            </div>
            </form>

        </div>
      </div>
  </div>
  </div>
  </div>

@stop
