@extends('layout')

<?php //エスケープ処理用にモデル内の関数利用のための処理 ?>
@inject('mylib', 'App\Company')


@section('content')
    <header>
        <a href="{{route('company_register')}}">求人登録</a>
    </header>
    <h1>求人検索</h1>
    <form action="{{route('store')}}" method="POST">
        @csrf
        <div>
            <label>勤務地：</label>
            <select name="place">
                @foreach ($prefs as $pref_num => $pref_name)
                    <option value="{{$pref_num}}">{{$pref_name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>希望年収：</label>
            <select name="income">
                @foreach ($incomes as $income_num => $income)
                    <option value="{{$income_num}}">{{$income}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>言語：</label>
            @foreach ($languages as $language_value => $language)
            <input type="checkbox" name="language[]" value="{{$language_value}}">{{$language}}
            @endforeach
        </div>
        <div>
            <label>スキルレベル：</label>
            <select name="skill">
                @foreach ($skills as $skill_num => $skill)
                    <option value="{{$skill_num}}">{{$skill}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>キーワード：</label>
            <input type="text" name="keyword" value="">
            <input type="submit" name="submit" value="検索する">
        </div>
    </form>
    <hr>
    @foreach ($items as $item)
        <div><a href="{{url('/',$item->id)}}">{{$mylib->escape($item->name)}}</a></div>
        <div>勤務地：{{$prefs[$item->place]}}</div>
        <div>年収：{{$incomes[$item->income]}}</div>
        <div>使用言語：
            @foreach ($mylib->display_language($item->language) as $lang)
                {{$languages[$lang]}}
            @endforeach
        </div>
        <div>スキルレベル：{{$skills[$item->skill]}}</div>
        <div>{{$mylib->escape($item->comment)}}</div>
        <hr>
    @endforeach
@endsection