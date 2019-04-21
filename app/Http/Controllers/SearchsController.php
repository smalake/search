<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\Http\Controllers\Controller;
use function Psy\info;

class SearchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prefs = config('pref');
        $incomes = Company::$incomes;
        $languages = Company::$languages;
        $skills = Company::$skills;
        $items = Company::all();
        return view('index',compact('prefs','incomes','languages','skills','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //検索結果をDBから引っ張ってくる
        $search_place = $request->place;
        $search_income = $request->income;
        $search_language = $request->language; //配列
        $search_skill = $request->skill;
        $loop_count = 0;
        $prefs = config('pref');
        $query = Company::query();

        if($search_place !== '0'){
            $query->where('place',$search_place);
        }
        if($search_income !== '0'){
            $query->where('income','>=',$search_income);
        }
        if($search_skill !== '0'){
            $query->where('skill',$search_skill);
        }
        if($search_language != NULL){
            foreach($search_language as $s_lang){
                if($loop_count !== 0){
                    $query->orWhere('language',$s_lang);
                }
                else{
                    $query->where('language',$s_lang);
                    $loop_count++;
                }
            }
        }
        $result = $query->get();
        return view('test2',compact('result','prefs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Company::findOrFail($id);

        $prefs = config('pref');
        $incomes = Company::$incomes;
        $languages = Company::$languages;
        $skills = Company::$skills;
        return view('show',compact('result','prefs','incomes','languages','skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function company_register(){
        $prefs = config('pref');
        $incomes = Company::$incomes;
        $languages = Company::$languages;
        $skills = Company::$skills;
        return view('company.company_register',compact('prefs','incomes','languages','skills'));
    }
    public function company_store(Request $request)
    {
        //DBへと登録

        $data = $request->all();
        //DBに登録するため配列を文字列化
        if(isset($data['language'])){
            $data['language'] = implode(",",$data['language']);
        }
        //入力チェック
        $validator = Validator::make($data,[
            'name' => 'required',
            'place' => 'required',
            'income' => 'required',
            'language' => 'required',
            'skill' => 'required',
            'comment' => 'required'
        ]);
        $validator->validate();
        $company = new Company();
        $company->name = $data['name'];
        $company->place = $data['place'];
        $company->income = $data['income'];
        $company->language = $data['language'];
        $company->skill = $data['skill'];
        $company->comment = $data['comment'];
        $company->save();
        return redirect('/');
    }
}
