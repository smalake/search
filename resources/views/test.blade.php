@extends('layout')

@section('content')
    {{$request->income}}
    {{$request->place}}
    @foreach ($request->language as $out_lang)
      {{$out_lang}}
    @endforeach
    {{$request->keyword}}
@endsection