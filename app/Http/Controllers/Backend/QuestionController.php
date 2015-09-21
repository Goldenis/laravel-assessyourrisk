<?php

namespace App\Http\Controllers\Backend;

use App\Models\Question;
use App\Models\QuestionOpcion;
use App\Models\QuestionType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function deleteImg($id)
    {
        $question = Question::find($id);
        $question->gif = '';
        $question->save();

        return 'salio';

       return redirect()->back();

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::orderAsc()->get();
        return view('admin.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $questionstype   = $this->listSelect();// funcion para listar typos de select
         return view('admin.question.create', compact('questionstype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $last_question = Question::orderDesc()->first();
        $question = new Question();
        $question->text = $request['text'];
        $question->question_type_id = $request['question_type_id'];
        $question->text_colum = $request['text_colum'];
        $question->button_text = $request['button_text'];
        $question->email = $request['email'];

        $file = $request->file('gif');
        if (Input::hasFile('gif')) {
            $name = date('Ymjs').$file->getClientOriginalName();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('local')->put($name,  File::get($file));

            $question->gif = $name;
        }




        if($request['slug']=='')
        {
            $question->slug = str_slug($request['text'],'_');
        }
        else
        {
            $question->slug = str_slug($request['slug'],'_');
        }

        $question->indelible = $request['indelible'];
        $question->active = $request['active'];
        $question->order = $last_question->order+1;
        $question->save();

        return redirect()->route('admin.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $question = Question::find($id);
        $questionoptions = QuestionOpcion::where('question_id',$id)->orderBy('order','asc')->get();
        return view('admin.question.show', compact('question','questionoptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $question = Question::find($id);
         $questionstype   = $this->listSelect();// funcion para listar typos de select
         return view('admin.question.edit', compact('question','questionstype'));
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
        $question = Question::find($id);
        $question->text = $request['text'];
        $question->question_type_id = $request['question_type_id'];
        $question->text_colum = $request['text_colum'];
        $question->button_text = $request['button_text'];
        $question->email = $request['email'];

        if($request['slug']=='')
        {
            $question->slug = str_slug($request['text'],'_');
        }
        else
        {
            $question->slug = str_slug($request['slug'],'_');
        }

        $question->indelible = $request['indelible'];
        $question->active = $request['active'];
        $question->email_subject = $request['email_subject'];
        $question->email_body = $request['email_body'];
        $question->update();

        $file = $request->file('gif');


        if (Input::hasFile('gif')) {

            $name = date('Ymjs').$file->getClientOriginalName();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($name,  \File::get($file));


            $question2 = Question::find($id);
            $question2->gif = $name;
            $question2->update();

        }

        return redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       Question::find($id)->delete();
    }

    /**
     * @return array
     * Genera la lista para los select
     */
    public function listSelect()
    {
        $questionstype   = QuestionType::lists('name','id');
        $questionstype = [''=>''] + $questionstype->toArray(); //convert a colleccion in a array
        return $questionstype;
    }

    public function updateOrder(Request $request)
    {
        if($request->ajax())
        {
            $i=1;
            foreach ($request['data'] as $item){
                $question = Question::find($item);
                $question->order = $i;
                $question->save();
                $i++;
            }

            return response()->json([
                'mensaje'=> $request['data']
            ]);
        }
    }


}
