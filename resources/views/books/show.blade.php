@extends('adminlte::page')
@section('title', 'Edit Book')
@section('content_header')
    <h1> Edit Book</h1>
@stop
@section('content')
  <div class="content">
  <div class="container-fluid">
  <div class="container">
      <div class="row">
        <div class="col-md-12">

    
        <div class="flex-center position-ref full-height">
        <div class="content">
            <h1 class="title m-b-md" style="background: #ccc">
                {{ $book->title }}
            </h1>

            <div class="row">
                <article class="col-md-12">
                    <p>
                        {{ $book->description }}
                    </p>
                </article>
            </div>

        </div>
        </div>

        </div>
      </div>
  </div>
  </div>
  </div>

@stop

@section('js')

<script>
  //$(document).ready(function()
   // {
   //   window.alert('one'); 

   // });
</script>
  
  @if(\Auth::check())
        <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
        <script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
        <script>
            window.Echo.channel('book.{{$book->id}}')
                .listen('BookViewed', function (e) {
                    if(e.data.current_user != parseInt('{{ \Auth::user()->id }}')) {
                        showNotification("Another user looking at this book right now");
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
