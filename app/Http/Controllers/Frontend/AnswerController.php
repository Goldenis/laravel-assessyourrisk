<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Models\Metric_answer;
use App\Models\Question;
use App\Models\QuestionOpcion;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Result_level;
use App\Models\Share;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function result(Request $request)
    {
        //este el es objeto con todas las respuestas
        $datos = $request['data'];
        $quiz = $request['quiz'];

        foreach($datos as $key=>$value){

            //$a = $key + 0;
           $question_order = Question::find($key);
           //..;

            if(gettype($value)=='array')
            {
                foreach($value as $i=>$val){

                    //$question_order = Question::find($key)->order;
                    $answer = new Answer();
                    $answer->quiz_id = $quiz;
                    $answer->question_id = $key;

                    if($key==33){
                        if($val==0){
                            $val=44;
                        }else if($val==1){
                            $val=45;
                        }else if($val==2){
                            $val=46;
                        }else if($val==3){
                            $val=47;
                        }else if($val==4){
                            $val=48;
                        }else if($val==5){
                            $val=49;
                        }else if($val==6){
                            $val=50;
                        }
                    }

                    //for BMI (especial question)
                    if($key==49){ // 49 es para internet
                        if($val<18.5){
                            $val=95;
                        }else if($val>=18.5 && $val<=24.9){
                            $val=96;
                        }else if($val>=25 && $val<=29.9){
                            $val=97;
                        }else if($val>=30){
                            $val=98;
                        }
                    }

                    $answer->question_option_id = $val;
                    $answer->question_order = $question_order['order'];
                    $answer->save();

                    $metric_answer = new Metric_answer();
                    $metric_answer->session_id =$request['session'];
                    $metric_answer->quiz_id =$request['quiz'];
                    $metric_answer->question_id =$key;
                    $question = Question::find($key);
                    $metric_answer->question_text = $question->text;
                    $metric_answer->question_order = $question->order;
                    $metric_answer->domain = $_SERVER['SERVER_NAME'];
                    $metric_answer->answer_id =$answer->id;

                    if($key==34){
                        $metric_answer->answer_text = $value;

                    }else{
                        $answ = QuestionOpcion::find($val);
                        $metric_answer->answer_text = $answ->text;
                    }
                    $metric_answer->save();




                   /* $metric_answer->quiz_id =$request['quiz'];
                    $metric_answer->question_id =$i;

                    $question = Question::find($i);
                    $metric_answer->question_text =$question->text;

                    $answ = QuestionOpcion::find($val);
                    $metric_answer->answer_text = $answ->text;

                    $metric_answer->domain = $_SERVER['SERVER_NAME'];
                    $metric_answer->answer_id = $answer->id;
                    */


                }
            }
            else
            {
                //$orden = Question::find($key)->first();
               //var_dump($orden->id);

                $answer = new Answer();
                $answer->quiz_id = $quiz;
                $answer->question_id = $key;

                if($key==33){
                    if($value==0){
                        $value=44;
                    }else if($value==1){
                        $value=45;
                    }else if($value==2){
                        $value=46;
                    }else if($value==3){
                        $value=47;
                    }else if($value==4){
                        $value=48;
                    }else if($value==5){
                        $value=49;
                    }else if($value==6){
                        $value=50;
                    }
                }

                //for BMI (especial question)
                if($key==49){ // 49 es para internet
                    if($value<18.5){
                        $value=95;
                    }else if($value>=18.5 && $value<=24.9){
                        $value=96;
                    }else if($value>=25 && $value<=29.9){
                        $value=97;
                    }else if($value>=30){
                        $value=98;
                    }
                }



                $answer->question_option_id = $value;
                $answer->question_order = $question_order['order'];
                $answer->save();


                $metric_answer = new Metric_answer();
                $metric_answer->session_id =$request['session'];
                $metric_answer->quiz_id =$request['quiz'];
                $metric_answer->question_id =$key;
                $question = Question::find($key);
                $metric_answer->question_text = $question->text;
                $metric_answer->question_order = $question->order;
                $metric_answer->domain = $_SERVER['SERVER_NAME'];
                $metric_answer->answer_id =$answer->id;

                if($key==34){
                    $metric_answer->answer_text = $value;

                }else{
                    $answ = QuestionOpcion::find($value);
                    $metric_answer->answer_text = $answ->text;
                }

                $metric_answer->save();




            }
        }

        //return $question_order['order'];
        return $quiz;



      ////$questions = Question::active()->count();

        //return view('web/answers_result', compact('questions'));
    }




    public function loadAnswer(Request $request)
    {

        //este el es objeto con todas las respuestas
        $option = $request['option'];
        $question = $request['question'];
        $quiz = $request['quiz'];

        if(gettype($option)=='array'){

            foreach($option as $key=>$val){

                $answer = new Answer();
                $answer->quiz_id = $quiz;
                $answer->question_id = $question;

                if($question==33){
                    if($val==0){
                        $val=44;
                    }else if($val==1){
                        $val=45;
                    }else if($val==2){
                        $val=46;
                    }else if($val==3){
                        $val=47;
                    }else if($val==4){
                        $val=48;
                    }else if($val==5){
                        $val=49;
                    }else if($val==6){
                        $val=50;
                    }
                }

                //for BMI (especial question)
                if($question==49){ // 49 es para internet
                    if($val<18.5){
                        $val=95;
                    }else if($val>=18.5 && $val<=24.9){
                        $val=96;
                    }else if($val>=25 && $val<=29.9){
                        $val=97;
                    }else if($val>=30){
                        $val=98;
                    }
                }

                $question_order = Question::find($question);

                $answer->question_option_id = $val;
                $answer->question_order = $question_order['order'];
                $answer->save();

                $metric_answer = new Metric_answer();
                $metric_answer->session_id =$request['session'];
                $metric_answer->quiz_id =$request['quiz'];
                $metric_answer->question_id =$question;
                $metric_answer->question_text = $question_order['text'];
                $metric_answer->question_order = $question_order['order'];
                $metric_answer->domain = $_SERVER['SERVER_NAME'];
                $metric_answer->option_id = $val;

                if($question==34){
                    $metric_answer->option_text = $option;

                }else{
                    $answ = QuestionOpcion::find($val);
                    $metric_answer->option_text = $answ->text;
                }
                $metric_answer->save();
            }



        }else{

            $answer = new Answer();
            $answer->quiz_id = $quiz;
            $answer->question_id = $question;


            if($question ==33){
                if($option==0){
                    $option=44;
                }else if($option==1){
                    $option=45;
                }else if($option==2){
                    $option=46;
                }else if($option==3){
                    $option=47;
                }else if($option==4){
                    $option=48;
                }else if($option==5){
                    $option=49;
                }else if($option==6){
                    $option=50;
                }
            }

            //for BMI (especial question)
            if($question ==49){
                if($option<18.5){
                    $option=95;
                }else if($option>=18.5 && $option<=24.9){
                    $option=96;
                }else if($option>=25 && $option<=29.9){
                    $option=97;
                }else if($option>=30){
                    $option=98;
                }
            }

            $question_order = Question::find($question);

            $answer->question_option_id = $option;
            $answer->question_order = $question_order['order'];
            $answer->save();


            $metric_answer = new Metric_answer();
            $metric_answer->session_id =$request['session'];
            $metric_answer->quiz_id =$request['quiz'];
            $metric_answer->question_id =$question ;
            $metric_answer->question_text = $question_order['text'];
            $metric_answer->question_order = $question_order['order'];
            $metric_answer->domain = $_SERVER['SERVER_NAME'];
            $metric_answer->option_id = $option;

            if($question ==34){
                $metric_answer->option_text = $option;

            }else{
                $answ = QuestionOpcion::find($option);
                $metric_answer->option_text = $answ->text;
            }

            $metric_answer->save();


        }




    }



public function createQuiz()
{
    $quiz = new Quiz();
    $quiz->save();
    return $quiz->id;

}





    public function result_final($quiz_id)
    {
        $favors = Result::where('result_type_id',1)->get();
        $no_favors = Result::where('result_type_id',2)->get();

        $answers_array = Answer::where('quiz_id',$quiz_id)->lists('question_option_id');

        $share = Share::find(2);

        return view('web/answers_result_final',compact('share','favors','no_favors','answers_array'));
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
        if($question==49){ // 49 es para internet
            if($option_request<18.5){
                $option_request=95;
            }else if($option_request>=18.5 && $option_request<=24.9){
                $option_request=96;
            }else if($option_request>=25 && $option_request<=29.9){
                $option_request=97;
            }else if($option_request>=30){
                $option_request=98;
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
