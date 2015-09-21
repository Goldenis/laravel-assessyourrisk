<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{

     public function report($quizz,$level)
     {
         $textos = $this->getTextos();
         $levels = $this->getLevels();

         //favor / no favor
         $favors = Result::where('result_type_id',1)->get();
         $no_favors = Result::where('result_type_id',2)->get();

        //answers
         $answers = Answer::where('quiz_id',$quizz)->groupBy('question_id')->orderBy('question_order','asc')->get();

         // para hacer la comparación de existencia para favor y no_favor en la vista
         $answers_array = Answer::where('quiz_id',$quizz)->lists('question_option_id');


         $texto = $textos[$level];
         $level = $levels[$level];

         $view =  View::make('pdf.report', compact('texto','level','answers','favors','no_favors','answers_array'))->render();
         $pdf = App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->stream('report.pdf');
     }



    public function getTextos()
    {
        $textos =  [
            '1'      => '<p>Your answers suggest that you are at average baseline risk for breast and ovarian cancer, just like the majority of women in the general population. This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer. 75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about risk-reduction and early detection is still important</p>
<h2>WHAT TO DO NOW</h2><p>First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk. Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop. The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping. You can learn more about lifestyle risk-reduction strategies on our website.</p><p>In addition to finding out more about risk-reduction and early detection, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together. </p>' ,
            '2'   => '<p>Your answers suggest that you are at average baseline risk for breast and ovarian cancer, just like the majority of women in the general population. This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer. 75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about risk-reduction and early detection is still important</p>
<h2>WHAT TO DO NOW</h2><p>First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk. Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop. The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping. You can learn more about lifestyle risk-reduction strategies on our website.</p><p>In addition to finding out more about risk-reduction and early detection, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together. </p>' ,
            '3'   => '<p>Your answers suggest that you are at average baseline risk for breast and ovarian cancer, just like the majority of women in the general population. This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer. 75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about risk-reduction and early detection is still important</p>
<h2>WHAT TO DO NOW</h2><p>First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk. Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop. The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping. You can learn more about lifestyle risk-reduction strategies on our website.</p><p>In addition to finding out more about risk-reduction and early detection, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together. </p>' ,

        ];
        return $textos;
    }

    public function getLevels()
    {
        $levels=[
            '1'=>'AVERAGE',
            '2'=>'INCREASED',
            '3'=>'HIGH'
        ];
        return $levels;
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
