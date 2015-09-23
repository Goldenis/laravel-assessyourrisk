<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Education;
use App\Models\Pledge;
use App\Models\Share;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $lifestyle_list   = Education::where('education_category_id',1)->active()->orderAsc()->get();
        $normal_list      = Education::where('education_category_id',2)->active()->orderAsc()->get();
        $family_list      = Education::where('education_category_id',3)->active()->orderAsc()->get();
        $pledge_lifestyle = Pledge::where('education_category_id',1)->count();
        $pledge_normal    = Pledge::where('education_category_id',2)->count();
        $pledge_family    = Pledge::where('education_category_id',3)->count();

        $share = Share::find(4);


        return view('web.education',compact('share','lifestyle_list','normal_list','family_list','pledge_lifestyle','pledge_normal','pledge_family'));
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
