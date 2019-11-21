<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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

            'name'=> 'required'
        ]);

        $dish = new Dish();

        $dish->name = $request->name;
        $dish->slug = str_slug($request->name);

        $dish->save();

        Toastr::success('One New Dish is Added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('dish.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);

        return view('admin.dishes.edit',compact('dish'));
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

            'name'=> 'required'
        ]);

        $dish = Dish::find($id);

        $dish->name = $request->name;
        $dish->slug = str_slug($request->name);

        $dish->save();

        Toastr::success('Dish updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('dish.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dish::find($id)->delete();

        Toastr::success('Dish Deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
