<?php

namespace App\Http\Controllers\Backend;

use App\Models\Question;
use App\Models\QuestionOpcion;
use App\Models\Result;
use App\Models\Result_level;
use App\Models\Result_type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = new Result();
        $result->question_id = $request['question_id'];
        $result->result_type_id = $request['result_type_id'];
        $result->result_level_id = $request['result_level_id'];
        $result->subtitle = $request['subtitle'];
        $result->title = $request['title'];
        $result->content = $request['content'];
        $result->condition = 0;
        $result->value = 0;
        $result->question_opcion_id = $request['question_opcion_id'];
        $result->save();
        \Session::flash('message', 'Has been created');
        return redirect()->route('admin.result.showByQuestion',$request['question_id']);

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
    public function edit(Request $request, $id)
    {
        $result = Result::find($id);

        $question = Question::find($request['question']);

        $result_type   = Result_type::lists('name','id');
        $result_type = [''=>''] + $result_type->toArray(); //convert a colleccion in a array

        $result_level = Result_level::lists('name','id');
        $result_level = [''=>''] + $result_level->toArray();

        $question_options = QuestionOpcion::where('question_id',$request['question'])->lists('text','id');

        return view('admin.results.edit',compact('result','question','result_type','result_level','question_options'));
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
        $result = Result::find($id);
        $result->question_id = $request['question_id'];
        $result->result_type_id = $request['result_type_id'];
        $result->result_level_id = $request['result_level_id'];
        $result->subtitle = $request['subtitle'];
        $result->title = $request['title'];
        $result->content = $request['content'];
        $result->condition = $request['condition'];
        $result->value = $request['value'];
        $result->question_opcion_id = $request['question_opcion_id'];
        $result->update();
        \Session::flash('message', 'Has been updated');
        return redirect()->route('admin.result.showByQuestion',$request['question_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Result::find($id)->delete();
    }

    public function showByQuestion($question_id)
    {
        $results = Result::where('question_id',$question_id)->groupBy('result_type_id')->get();
        $question = Question::find($question_id);
        return view('admin.results.showByQuestion',compact('results','question'));
    }

    public function createByQuestion($question_id)
    {
        $question = Question::find($question_id);
        $questiontype = $question->questionType->id;

        $result_type   = Result_type::lists('name','id');
        $result_type = [''=>''] + $result_type->toArray(); //convert a colleccion in a array

        $result_level = Result_level::lists('name','id');
        $result_level = [''=>''] + $result_level->toArray();

        $question_options = QuestionOpcion::where('question_id',$question_id)->lists('text','id');

        return view('admin.results.createByQuestion',compact('question','questiontype','result_type','result_level','question_options'));
    }



}
