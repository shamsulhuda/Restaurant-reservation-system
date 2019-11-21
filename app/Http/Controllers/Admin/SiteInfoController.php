<?php

namespace App\Http\Controllers\Admin;

use App\Sitegallery;
use App\Siteinformation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteinformation = Siteinformation::all();

        return view('admin.gallery.info.index', compact('siteinformation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Sitegallery::all();
        return view('admin.gallery.info.create',compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'gallery_id'=> 'required',
            'description'=> 'required',
        ]);

        $sitinfo = new Siteinformation();

        $sitinfo->gallery_id = $request->gallery_id;
        $sitinfo->description = $request->description;

        $sitinfo->save();

        Toastr::success('Site information added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siteinfo = Siteinformation::find($id);
        $galleries = Sitegallery::all();

        return view('admin.gallery.info.edit', compact('siteinfo','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'gallery_id'=> 'required',
            'description'=> 'required',
        ]);

        $sitinfo = Siteinformation::find($id);

        $sitinfo->gallery_id = $request->gallery_id;
        $sitinfo->description = $request->description;

        $sitinfo->save();

        Toastr::success('Site information Updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siteinformation::find($id)->delete();

        Toastr::success('Site information Deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
