@extends('layouts.app')
@section('title', $title.'聊天室')

@section('content')
<div class="alert alert-dark alert-dismissible fade show" role="alert">
  欢迎来到 <b>{{ $channel->name }}</b> 聊天室
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
@include('shared._errors')
<form action="{{ route('room.Rstore') }}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="channel_id" value="{{ $channel->id }}">
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
    <button type="submit" class="btn btn-primary">提交</button>
  </div>
</form>
<div style="height:100px;overflow:auto;">
  @foreach($mes as $mess)
    {{ $mess->name }}-{{ $mess->content }} - {{ $mess->created_at }}
    <hr>
  @endforeach
</div>
@stop