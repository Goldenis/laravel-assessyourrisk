<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\File;



class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = Input::file('logo');


       if (Input::hasFile('logo')) {

            $final_name = str_random(4).'_'.$file->getClientOriginalExtension();

            $brand = new Brand();
            $brand->title = $request['title'];
            $brand->logo = $final_name;
            $brand->url = $request['url'];
            $brand->save();

            $img = Image::make($file);

            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path() . '/img/' . $final_name);
       }

        return redirect()->route('admin.brand.index');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
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

        $brand = Brand::find($id);
        $brand->title = $request['title'];
        $brand->url = $request['url'];
        $brand->save();


        $file = Input::file('logo');


        if (Input::hasFile('logo')) {

            $final_name = str_random(4).'_'.$file->getClientOriginalExtension();

            $brand2 = Brand::find($id);
            $brand2->logo = $final_name;
            $brand2->save();

            $img = Image::make($file);

            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path() . '/img/' . $final_name);
        }
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
    }
}
