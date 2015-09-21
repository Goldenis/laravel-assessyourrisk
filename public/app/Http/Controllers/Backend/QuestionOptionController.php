<?php

namespace App\Http\Controllers\Backend;

use App\Models\Question;
use App\Models\QuestionOpcion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       // return view('admin.questionoption.index');
    }

    public function loadselect($id)
    {
        $options = QuestionOpcion::where('question_id',$id)->lists('text','id');
        return view('admin.level.partials.select',compact('options'));
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
        $questionoption = new QuestionOpcion();
        $questionoption->question_id = $request['question_id'];
        $questionoption->text = $request['text'];
        $questionoption->value = $request['value'];
        $questionoption->button_text = $request['button_text'];
        $questionoption->active = $request['active'];
        $questionoption->order = 0;
        $questionoption->unique = $request['unique'];
        $questionoption->save();

        return redirect()->route('admin.question.show',$request['question_id']);
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
        $questionoption = QuestionOpcion::find($id);
        $questiontype = $questionoption->question->questionType->id;
        $question = Question::find($questionoption->question->id);
        return view('admin.questionoption.edit', compact('questionoption','questiontype','question'));
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
        $questionoption = QuestionOpcion::find($id);
        $questionoption->text = $request['text'];
        $questionoption->value = $request['value'];
        $questionoption->button_text = $request['button_text'];
        $questionoption->active = $request['active'];
        $questionoption->question_id = $request['question_id'];
        $questionoption->unique = $request['unique'];
        $questionoption->update();

        return redirect()->route('admin.question.show',$request['question_id']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        QuestionOpcion::find($id)->delete();
    }

    /**
     * @param $question_id
     * @return \Illuminate\View\View
     * register option by question
     */
    public function createOpcionQuestion($question_id)
    {
        $question =  Question::find($question_id);
        $questiontype = $question->questionType->id;
        return view('admin.questionoption.create', compact('question','questiontype'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * order items
     */
    public function updateOrder(Request $request)
    {
        if($request->ajax())
        {
            $i=1;
            foreach ($request['data'] as $item){
                $questionoption = QuestionOpcion::find($item);
                $questionoption->order = $i;
                $questionoption->save();
                $i++;
            }

            return response()->json([
                'mensaje'=> $request['data']
            ]);
        }
    }

    /**
     * @param $question_id
     * @param $questionoption_id
     * cambia todos los unique a cero y deja solo en 1 al que se le hizo click
     */
//    public function changeUnique($question_id, $questionoption_id)
//    {
//        $questionoptions = QuestionOpcion::where('question_id',$question_id)->get();
//            foreach($questionoptions as $questionoption)
//            {
//                $option = QuestionOpcion::find($questionoption->id);
//                $option->unique = 0;
//                $option->save();
//            }
//        if($questionoption_id!=0 || $questionoption_id != NULL)
//        {
//            $option_unique = QuestionOpcion::find($questionoption_id);
//            $option_unique->unique = 1;
//            $option_unique->save();
//        }
//
//    }
}
