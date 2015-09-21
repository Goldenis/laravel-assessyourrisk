<?php

namespace App\Http\Controllers\Backend;

use App\Models\EducationCategory;
use App\Models\Pledge;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PledgeController extends Controller
{

    public function count(){
        $count = Pledge::count();
        return $count;
    }

    public function countByCategory(Request $request)
    {
        $pledge = Pledge::where('education_category_id',$request['category'])
                          ->where('session_id',$request['session'])
                          ->count();

        return $pledge;
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
        $pledge = new Pledge();
        $pledge->education_category_id = $request['category_id'];
        $pledge->session_id = $request['session'];
        $pledge->save();
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
