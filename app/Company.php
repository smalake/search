<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','income','language','skill','comment'];

    static $incomes = ['0' => '▼ 選択', '1' => '〜300万', '2' => '301万〜400万', '3' => '401万〜500万', '4' => '500万〜'];
    static $languages = ['c' => 'C#', 'php' => 'PHP', 'ruby' => 'Ruby', 'java' => 'Java', 'python' => 'Python', 'other' => 'その他'];
    static $skills = ['0' => '▼ 選択', '1' => '未経験', '2' => '実務経験はあるが浅い', '3' => '実務経験もスキルも十分にある'];
}
