<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param $category
     * @return Renderable
     */
    public function index()
    {
        $category = Category::find(2);
        $parents = $category->parents;

        $category2 = Category::find(1);
        $children = $category2->children;
        return view('home',
            [
                'parents' => $parents,
                'children' => $children
            ]);
    }
}
