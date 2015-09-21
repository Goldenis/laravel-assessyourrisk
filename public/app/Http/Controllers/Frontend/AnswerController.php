<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Result_level;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function result()
    {
        $quiz = new Quiz();
        $quiz->save();

        return view('web/answers_result');
    }

    public function result_final()
    {
        $favors = Result::where('result_type_id',1)->get();
        $no_favors = Result::where('result_type_id',2)->get();

        return view('web/answers_result_final',compact('favors','no_favors'));
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

        $quiz = Quiz::orderBy('id','desc')->first();
        $question = $request['question_id'];
        $option_request = $request['question_option_id'];

        $question_order = Question::find($question)->order;



        //for the bottles (especial question)
        if($question==33){
            if($option_request==0){
                $option_request=44;
            }else if($option_request==1){
                $option_request=45;
            }else if($option_request==2){
                $option_request=46;
            }else if($option_request==3){
                $option_request=47;
            }else if($option_request==4){
                $option_request=48;
            }else if($option_request==5){
                $option_request=49;
            }else if($option_request==6){
                $option_request=50;
            }
        }

        //for BMI (especial question)
        if($question==34){
            if($option_request<18.5){
                $option_request=51;
            }else if($option_request>=18.5 && $option_request<=24.9){
                $option_request=52;
            }else if($option_request>=25 && $option_request<=29.9){
                $option_request=53;
            }else if($option_request>=30){
                $option_request=54;
            }
        }

        $options = explode(',',$option_request);

        foreach($options as $answer){
            $valor =  $answer;
            $answer = new Answer();
            $answer->quiz_id = $quiz->id;
            $answer->question_id = $request['question_id'];
            $answer->question_option_id = $valor;
            $answer->question_order = $question_order;
            $answer->save();
        }

        return $quiz->id;

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
