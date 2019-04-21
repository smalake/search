@extends('layout')
@inject('mylib', 'App\Company')


@section('content')
    <h1>{{$mylib->escape($result->name)}}</h1>
    <div>勤務地：{{$prefs[$result->place]}}</div>
    <div>想定年収：{{$incomes[$result->income]}}</div>
    <div>使用言語：{{$languages[$result->language]}}</div>
    <div>必要スキルレベル：{{$skills[$result->skill]}}</div>
@endsection