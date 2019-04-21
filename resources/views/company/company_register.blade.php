@extends('layout')

@section('content')
    <h1>求人登録</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('company_store')}}" method="POST">
            @csrf
            <div>
                <label>社名：</label>
                <input type="text" name="name" value="">
            </div>
            <div>
                <label>勤務地：</label>
                <select name="place">
                    @foreach ($prefs as $pref_num => $pref_name)
                        <option value="{{$pref_num}}">{{$pref_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>想定年収：</label>
                <select name="income">
                    @foreach ($incomes as $income_num => $income)
                        <option value="{{$income_num}}">{{$income}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>使用言語：</label>
                @foreach ($languages as $language_value => $language)
                <input type="checkbox" name="language[]" value="{{$language_value}}">{{$language}}
                @endforeach
            </div>
            <div>
                <label>必要なスキルレベル：</label>
                <select name="skill">
                    @foreach ($skills as $skill_num => $skill)
                        <option value="{{$skill_num}}">{{$skill}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>コメント：</label><br>
                <textarea name="comment" rows="5" cols="40"></textarea><br>
                <input type="submit" name="submit" value="登録する">
            </div>
        </form>
@endsection