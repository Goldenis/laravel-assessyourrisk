<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class QuestionController extends Controller
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
        $question = Question::find($id);
        $count = Question::count();
        return view('web.question',compact('question','count'));
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

    public function result()
    {

    }

    public function showSlug($slug)
    {
        $question = Question::where('slug',$slug)->first();
        $question_next = Question::where('order',$question->order+1)->first();
        $question_renext = Question::where('order',$question->order+2)->first();
        $question_prev = Question::where('order',$question->order-1)->first();
        $question_reprev = Question::where('order',$question->order-2)->first();


        if($question_renext!=null){
            $url_renext = $question_renext->slug;
        }else{
            $url_renext = "";
        }

        if($question_reprev!=null){
            $url_reprev = $question_reprev->slug;
        }else{
            $url_reprev = "";
        }


        if($question_next==null){
            $url = "../../answers/results"; //si se llego al final de las preguntas y ya no hay mas, se va a los resultados.
        }
        else
        {
            $url = $question_next->slug;
        }



        if($question_prev==null){
            $url_prev = ""; //si es el comienzo de las preguntas.
        }
        else
        {
            $url_prev = $question_prev->slug;
        }

        $count = Question::count();
        $text_colum = $question->text_colum;
        return view('web.question',compact('question','count','url','url_prev','text_colum','url_renext','url_reprev'));
    }
}
