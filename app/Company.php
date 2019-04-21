<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','income','language','skill','comment'];

    static $incomes = ['0' => '▼ 選択', '250' => '250万以上', '300' => '300万以上', '350' => '350万以上', '400' => '400万以上', '450' => '450万以上', '500' => '500万以上'];
    static $languages = ['c' => 'C#', 'php' => 'PHP', 'ruby' => 'Ruby', 'java' => 'Java', 'python' => 'Python', 'other' => 'その他'];
    static $skills = ['0' => '▼ 選択', '1' => '未経験', '2' => '実務経験はあるが浅い', '3' => '実務経験もスキルも十分にある'];
    static function escape($s){
        return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
    }
    static function display_language($s){
        return explode(",",$s);
    }
}
