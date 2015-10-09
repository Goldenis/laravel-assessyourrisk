<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Education;
use App\Models\Intro;
use App\Models\Pledge;
use App\Models\Question;
use App\Models\Result;
use App\Models\Share;
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
        $share = Share::find(1);// solo para el overlay male (first question)

        if($question_renext!=null){
            $url_renext = $question_renext->slug;
        }
        else
        {
            $url_renext = "";
        }

        if($question_reprev!=null){
            $url_reprev = $question_reprev->slug;
        }
        else
        {
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
        return view('web.question',compact('share','question','count','url','url_prev','text_colum','url_renext','url_reprev'));
    }

    public function questionloadajax(Request $request)
    {
        $slug =  $request['slug'];
        $question = Question::where('slug',$slug)->first();
        $question_next = Question::where('order',$question->order+1)->first();
        $question_renext = Question::where('order',$question->order+2)->first();

        $question_prev = Question::where('order',$question->order-1)->first();
        $question_reprev = Question::where('order',$question->order-2)->first();

        $question_slug = $question->slug;
        $share = Share::find(1);// solo para el overlay male (first question)

        if($question_renext!=null){
            $url_renext = $question_renext->slug;
        }
        else
        {
            $url_renext = "";
        }

        if($question_reprev!=null){
            $url_reprev = $question_reprev->slug;
        }
        else
        {
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

        return view('web.questionloadajax',compact('question_slug','share','question','count','url','url_prev','text_colum','url_renext','url_reprev'));

    }

    public function questions2(Request $request)
    {
        $questions = Question::orderAsc()->get();
        $last_question = Question::OrderDesc()->first();

        $lifestyle_list   = Education::where('education_category_id',1)->active()->orderAsc()->get();
        $normal_list      = Education::where('education_category_id',2)->active()->orderAsc()->get();
        $family_list      = Education::where('education_category_id',3)->active()->orderAsc()->get();
        $pledge_lifestyle = Pledge::where('education_category_id',1)->count();
        $pledge_normal    = Pledge::where('education_category_id',2)->count();
        $pledge_family    = Pledge::where('education_category_id',3)->count();

        $intro = Intro::find(1);

        $assessment_intro = Intro::find(2);
        $first_question = Question::OrderBy('order','asc')->first();


        $favors = Result::where('result_type_id',1)->get();
        $no_favors = Result::where('result_type_id',2)->get();

       // dd($pledge_lifestyle); die;


        $share = Share::find(1);
        $share_result = Share::find(2);
        $share_result_overlay = Share::find(3);
        $share_education = Share::find(4);
        //dd($questions); die;
        //$slug =  $request['slug'];
       // $question = Question::where('slug',$slug)->first();
      /*  $question_next = Question::where('order',$question->order+1)->first();
        $question_renext = Question::where('order',$question->order+2)->first();

        $question_prev = Question::where('order',$question->order-1)->first();
        $question_reprev = Question::where('order',$question->order-2)->first();

        $question_slug = $question->slug;
       ;// solo para el overlay male (first question)

        if($question_renext!=null){
            $url_renext = $question_renext->slug;
        }
        else
        {
            $url_renext = "";
        }

        if($question_reprev!=null){
            $url_reprev = $question_reprev->slug;
        }
        else
        {
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
        }*/

        $count = Question::count() + 1;
       // $text_colum = $question->text_colum;

         return view('web.index',compact('share_education','share_result_overlay','share_result','favors','no_favors','assessment_intro','intro','last_question','questions','share','count','lifestyle_list','normal_list','family_list','pledge_lifestyle','pledge_normal','pledge_family'));

    }

    public function questions()
    {
        return view('web.questions');
    }




}
