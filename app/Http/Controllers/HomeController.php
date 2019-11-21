<?php

namespace App\Http\Controllers;

use App\Item;
use App\Slider;
use App\Category;
use App\Dish;
use App\Dishitem;
use App\Sitegallery;
use App\Siteinformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        $dishes = Dish::all();
        $dishitems = Dishitem::all();
        $galleries[] = Sitegallery::all();
        $siteinfo = Siteinformation::all();
        return view('welcome', compact('sliders',
        	'categories',
        	'items',
        	'dishes',
        	'dishitems',
        	'galleries',
        	'siteinfo'
        ));
    }

}
