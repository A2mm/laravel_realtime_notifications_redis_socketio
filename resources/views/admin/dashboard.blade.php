@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1> Dashboard </h1>
@stop
@section('content')
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3> Laravel </h3>
          <p>Users</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
       <!-- small box -->
     </div>

      <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3> Laravel </h3>
          <p>Users</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
       <!-- small box -->
     </div>    

  </div>
@stop