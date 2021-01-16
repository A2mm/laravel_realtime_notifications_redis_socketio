@extends('layouts.app')
@section('content')
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
@stop

@section('scripts')
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