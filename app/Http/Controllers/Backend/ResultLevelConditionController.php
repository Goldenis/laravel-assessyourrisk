<?php

namespace App\Http\Controllers\Backend;

use App\Models\Question;
use App\Models\Result_level;
use App\Models\ResultLevelCondition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResultLevelConditionController extends Controller
{
    public function showByLevel($level_id)
    {
        $conditions = ResultLevelCondition::where('result_level_id',$level_id)->get();
        $level = Result_level::where('id',$level_id)->get();
        $level_name = $level[0]->name;
        return view('admin.level.show',compact('conditions','level_name','level_id'));
    }

    public function createByLevel($level_id)
    {
        $questions = Question::all()->lists('text','id');
        return view('admin.level.create',compact('questions','level_id'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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
        $condition = new ResultLevelCondition($request->all());
        $condition->save();
        \Session::flash('message', 'Has been created');
        return redirect()->route('admin.resultlevelcondition.level', $request['result_level_id']);

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
        $condition = ResultLevelCondition::find($id);
        $level_id = $condition->result_level_id;
        $questions = Question::all()->lists('text','id');
        return view('admin.level.edit',compact('condition','questions','level_id'));
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
        $condition = ResultLevelCondition::find($id);
        $condition->result_level_id = $request['result_level_id'];
        $condition->question_id = $request['question_id'];
        $condition->question_option_id = $request['question_option_id'];
        $condition->active = $request['active'];
        $condition->save();
        \Session::flash('message', 'Has been updated');
        return redirect()->route('admin.resultlevelcondition.level',$request['result_level_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $condition = ResultLevelCondition::find($id);
        $condition->delete();

    }
}
