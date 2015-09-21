<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Result;
use App\Models\Result_level;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResultLevelController extends Controller
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
        $level = Result_level::find($id);

        $name = $level->name;
        $text_less = $level->text_less;
        $text_less_col2 = $level->text_less_col2;
        $text_more = $level->text_more;
        $text_more_col2 = $level->text_more_col2;

        $datos = json_encode(['name'=>$name,
            'text_less'=>$text_less,
            'text_less_col2'=>$text_less_col2,
            'text_more'=>$text_more,
            'text_more_col2'=>$text_more_col2,

        ]);
        return $datos;
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
