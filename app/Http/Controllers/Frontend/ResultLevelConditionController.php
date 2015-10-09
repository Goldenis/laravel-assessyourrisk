<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ResultLevelCondition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResultLevelConditionController extends Controller
{
    public function findlevel(Request $request)
    {

        $request->all();

        $question = $request['question_id'];
        $option_request = $request['question_option_id'];

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
        if($question==49){
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
        $i=0;
        foreach($options as $option)
        {

            $conditions = ResultLevelCondition::where('question_option_id',$option)->lists('result_level_id');
                if(isset($conditions[0])) // esta condicion es por si es que no hay opcion en la db
                {
                    $dato[$i] = $conditions[0];
                    $i++;
                }
                else
                {
                    $dato[$i] = 1;
                    $i++;
                }

        }

        return max($dato); //consigo el maximo riesgo (level)
    }
    /**
     * Display a listing of the resource.     *
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
