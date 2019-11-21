<?php

namespace App\Http\Controllers\Admin;

use App\Dishitem;
use App\Dish;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishitems = Dishitem::all();

        return view('admin.dishitem.index', compact('dishitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();
        return view('admin.dishitem.create',compact('dishes'));
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
            'name' => 'required',
            'dish_id'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp',
        ]);


        $image = $request->file('image');

        $slug = str_slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/dishitem')) {
                mkdir('uploads/dishitem', 0777, true);
            }

            $image->move('uploads/dishitem', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $dishitem = new Dishitem();

        $dishitem->name = $request->name;
        $dishitem->dish_id = $request->dish_id;
        $dishitem->description = $request->description;
        $dishitem->price = $request->price;
        $dishitem->image = $imagename;

        $dishitem->save();

        Toastr::success('Dish item Added successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('dishitem.index');
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
        $dishitem = Dishitem::find($id);
        $dishes = Dish::all();

        return view('admin.dishitem.edit', compact('dishitem','dishes'));
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
            'name' => 'required',
            'dish_id'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp',
        ]);



        $image = $request->file('image');

        $slug= str_slug($request->name);

        $dishitem = Dishitem::find($id);


        if (isset($image)) {

            $previoueImage = public_path("uploads/dishitem/{$dishitem->image}");
            if (file_exists($previoueImage)) {
                unlink($previoueImage);
            }

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/dishitem')) {
                mkdir('uploads/dishitem', 0777, true);
            }

            $image->move('uploads/dishitem', $imagename);
        }else{
            $imagename = $dishitem->image;
        }


        $dishitem->name = $request->name;
        $dishitem->dish_id = $request->dish_id;
        $dishitem->description = $request->description;
        $dishitem->price = $request->price;
        $dishitem->image = $imagename;

        $dishitem->save();

        Toastr::success('Dish item Updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('dishitem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dishitem = Dishitem::find($id);

        $previousimg = public_path("uploads/dishitem/{$dishitem->image}");

        if ($previousimg) {
            unlink($previousimg);
        }

        $dishitem->delete();

        Toastr::success('Dish item Deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
