<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
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
        //$result_id = Company::select('id','place','income','language','skill')->where('place','=',$search_place)->where('income','=',$search_income)->where('language','=',$search_language)->where('skill','=',$search_skill)->value('id');
        $result_id = Company::select('id','place')->where('place','=',$search_place)->value('id');
        return view('test2',compact('result_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
