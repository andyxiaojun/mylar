@extends('layouts.app')

@section('title','创建房间')

@section('content')

@include('shared._errors')
<form action="{{ route('channel.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">名称</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">分类</label>
    <select class="form-control" id="exampleFormControlSelect1" name="class">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="channel_img">上传封面</label>
    <input type="file" class="form-control-file" id="channel_img" name="cover">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">介绍</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">提交</button>
</form>
@stop