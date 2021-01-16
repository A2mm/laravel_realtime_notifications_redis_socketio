@extends('adminlte::page')
@section('title', 'All Books')
@section('content_header')
    <h1>All Books</h1>
@stop
@section('content')
  <div class="content">
                <div class="container-fluid">
                    <div class="container">
    <div class="row">
        <div class="col-md-12">
                {{-- print success message --}}
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                           <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->description }}</td>
                                <td>
                                    <a href="{{route('books.show', $book->id)}}" title=""class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Show </a>

                                    <a href="{{route('books.edit', $book->id)}}" title=""class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                                    <a href="{{route('books.delete', $book->id)}}" title="" class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Delete</a>
                                    
                                </td>
                            </tr>
                            @endforeach                             
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>

@stop