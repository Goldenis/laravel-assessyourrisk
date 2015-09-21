<?php

namespace App\Http\Controllers\Backend;

use App\Models\Sent;
use App\Models\Senttype;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.sent.index');
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
        $sent = Sent::find($id);

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
        $sent = Sent::find($id)->delete();
    }

    /**
     * @param $sentTypeId
     * @return \Illuminate\View\View
     * List sent by type
     */
    public function listByType($sentTypeId)
    {
        $sent = Sent::where('sent_type_id',$sentTypeId)->paginate(20);
        $name = Senttype::find($sentTypeId)->name;
        return view('admin.sent.listByType',compact('sent','name'));
    }

}
