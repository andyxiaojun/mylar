@extends('layouts.app')
@section('title', '首页')

@section('content')
  <h1>房间列表</h1>
  <hr>
  @if(count($channels))
    <div class="container">
      <div class="row">
      @foreach ($channels as $channels)
        <div class="col-2">
          <a href="{{ route('room', [$channels->id]) }}"><img src="{{ $channels->cover }}" alt="封面" title="{{ $channels->name }}" class="rounded-left" style="width: 75px;height: 75px;"></a>
        </div>
  	@endforeach
      </div>
    </div>
  @else
  	<div class="empty-block">暂无数据 ~_~ </div>
  	<hr>
  @endif
@stop