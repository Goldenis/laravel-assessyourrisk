<?php

namespace App\Http\Controllers\Backend;

use App\Models\Education;
use App\Models\EducationCategory;
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
        $educations = Education::all();

        return view('admin.education.index', compact('educations'));
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
        $education = new Education();
        $education->education_category_id = $request['education_category_id'];
        $education->active = $request['active'];
        $education->title = $request['title'];
        $education->text = $request['text'];
        $education->video = $request['video'];
        $education->order = 0;
        $education->save();

        return redirect('admin/education/'.$request["education_category_id"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $educationcategories = EducationCategory::all();
        $category = EducationCategory::find($id);
        $educations = Education::where('education_category_id',$id)
                                ->orderAsc()->get();
        return view('admin.education.show', compact('educationcategories','category','educations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('admin.education.edit', compact('education'));
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
        $education = Education::find($id);
        $education->title = $request['title'];
        $education->text = $request['text'];
        $education->active = $request['active'];
        $education->video = $request['video'];
        $education->update();

        return redirect()->route('admin.education.show', $request['education_category_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       Education::find($id)->delete();
    }


    /**
     * @return \Illuminate\View\View
     * show list of items but don't work now
     */
    public function education_list_ajax(){
        $educations = Education::orderDesc()->get();
        return view('admin.ajax.education_list', compact('educations'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     * create items of educatin by category
     */
    public function create_item($id){

        $category = EducationCategory::find($id);
        $educations = Education::where('education_category_id',$id)->orderAsc()->get();
        return view('admin.education.create_item',compact('educations','category'));
    }

    public function updateOrder(Request $request, $id)
    {

       // dd($request['data']);

        if($request->ajax())
        {
            $i=1;
           foreach ($request['data'] as $item){
                $education = Education::find($item);
                $education->order = $i;
                $education->save();
               $i++;
            }

            return response()->json([
                'mensaje'=> $request['data']
            ]);
        }
    }


}
