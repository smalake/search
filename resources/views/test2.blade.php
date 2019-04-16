@extends('layout')

@section('content')
@foreach ($result as $item)
<div>{{$item->name}}</div>
<div>勤務地：{{$prefs[$item->place]}}</div>
<div>年収：{{$item->income}}</div>
<div>使用言語：{{$item->language}}</div>
<div>スキルレベル：{{$item->skill}}</div>
<div>{{$item->comment}}</div>
<hr>
@endforeach
@endsection