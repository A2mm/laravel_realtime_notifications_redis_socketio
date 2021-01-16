@extends('adminlte::page')
@section('title', 'Edit Book')
@section('content_header')
    <h1 id="hdd"> Edit Book </h1>
@stop
@section('content')
  <div class="content">
  <div class="container-fluid">
  <div class="container">
      <div class="row">
        <div class="col-md-12">

 <div id="notification"></div>

             {{-- print success message --}}
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

    <form action="{{route('books.update')}}" method="post" enctype="multipart/form-data ">
                {{ csrf_field() }}

                                 <input type="hidden" name="id" class="form-control" value="{{$book->id}}">

                                <div class="form-group">
                                    <label for="title"> Book Title <span class="text-danger"> * </span>  </label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Book Title" value="{{$book->title}}">
                                    {!! $errors->first('title', '<small class="text-danger">:message </small>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="description"> Description <span class="text-danger"> * </span>  </label>
                                    <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$book->description}}">
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
<!-- 
    <script type="text/javascript">
        var i = 0;
        window.Echo.channel('user-channel')
         .listen('.EditEvent', (data) => {
            i++;
        });
    </script> 
-->

@section('js')
  @if(\Auth::check())
        <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
        <script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
        <script>
           // var i = 0;
            window.Echo.channel('EditBook.{{$book->id}}')
                .listen('BookEdit', function (e) {
                  //  i++;
                    if(e.data.current_user != parseInt('{{ \Auth::user()->id }}')) {
                        showNotification("Another user editing at this book right now");
                // $("#notification").append('<div class="alert alert-success">'+i+'.'+ e.data.title +'</div>');
             // $("#hdd .bdd").empty().text(i);
                    }
                });

            function showNotification(msg) {
                if (!("Notification" in window)) {
                    alert("This browser does not support desktop notification");
                }
                else if (Notification.permission === "granted") {
                    // If it's okay let's create a notification
                    var notification = new Notification(msg);
                }
                else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then(function (permission) {
                        // If the user accepts, let's create a notification
                        if (permission === "granted") {
                            var notification = new Notification(msg);
                        }
                    });
                }
            }
        </script>
    @endif 
@stop

       
  
   