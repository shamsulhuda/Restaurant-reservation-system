<?php

namespace App\Http\Controllers\Admin;

use App\Sitegallery;
use Illuminate\Support\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryinfo = Sitegallery::all();
        return view('admin.gallery.index',compact('galleryinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/gallery')) {
                mkdir('uploads/gallery', 0777, true);
            }

            $image->move('uploads/gallery',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $gallery = new Sitegallery();

        $gallery->title = $request->title;
        $gallery->image = $imagename;

        $gallery->save();

        Toastr::success('Gallery added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('gallery.index');
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
        $gallery = Sitegallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
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
        $this->validate($request,[
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        $gallery = Sitegallery::find($id);

        if (isset($image)) {
            $previousImg = public_path("uploads/gallery/{$gallery->image}");
            if (file_exists($previousImg)) {
                unlink($previousImg);
            }
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/gallery')) {
                mkdir('uploads/gallery', 0777, true);
            }

            $image->move('uploads/gallery',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $gallery->title = $request->title;
        $gallery->image = $imagename;

        $gallery->save();

        Toastr::success('Gallery updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Sitegallery::find($id);

        $previousImg = public_path("uploads/gallery/{$gallery->image}");

        if (file_exists($previousImg)) {
            unlink($previousImg);
        }

        $gallery->delete();

        Toastr::success('Gallery Deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
