<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Models\Metric_answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MetricAnswerController extends Controller
{
    public function load(Request $request)
    {
        $metric = new Metric_answer();

        $answer_text = Answer::find($request['answer_id']);


        $metric->session_id = $request['session_id'];
        $metric->question_id = $request['question_id'];
        $metric->question_order = $request['question_order'];

        $answer = $request['answer_id'];

        if($request['question_id']==34){

                if($answer<18.5){
                    $answer=51;
                }else if($answer>=18.5 && $answer<=24.9){
                    $answer=52;
                }else if($answer>=25 && $answer<=29.9){
                    $answer=53;
                }else if($answer>=30){
                    $answer=54;
                }
        }

        $metric->answer_id = $answer;
        $metric->answer_text = $answer_text->questionoption->text;
        $metric->quiz_id = $request['quiz_id'];
        $metric->domain = $_SERVER['SERVER_NAME'];
        $metric->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
