<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            "title" => "Kopilojik - KOPI | BURGER | SHISHA",
            "blogs" => Blogs::all(),
            "products" => Products::all()
        ]);
    }

    public function content($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();

        return view('content', [
            "title" => "Kopilojik - " . $blog->title,
            "blog" => $blog,
        ]);
    }

    public function about()
    {
        return view('about', [
            "title" => "About - Kopilojik"
        ]);
    }

    public function menu()
    {
        return view('menu', [
            "title" => "Menu - Kopilojik",
            "products" => Products::all()
        ]);
    }

    public function contact()
    {
        return view('contact', [
            "title" => "Contact - Kopilojik"
        ]);
    }
}
