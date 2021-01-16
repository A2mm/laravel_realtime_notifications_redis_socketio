@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h2 class="title m-b-md" style="background: #ccc">
                books
            </h2>
            <div class="row">
                @foreach($books as $book)
                    <article class="col-md-10">
                        <h4><a href="{{ url('details/' . $book->id) }}">{{ $book->title }}</a></h4>
                        <p>
                            {{ substr($book->description, 0, 50) }}
                        </p>
                    </article>
                    <hr/>
                @endforeach
            </div>
        </div>
    </div>
@stop