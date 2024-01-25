<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class CategorysController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categorys',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        Categorys::create($validatedData);

        return redirect('/dashboard/categorys')->with('sukses', 'Kategori Berhasil Ditambahkan !');
    }

    public function read()
    {
        return view('pages.dashboard.categorys.index', [
            "title" => "Categorys",
            'categorys' => Categorys::all()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('categorys')->ignore($request->id),
            ],
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        $category = Categorys::findOrFail($request->id);
        $category->update($validatedData);

        return redirect('/dashboard/categorys')->with('sukses', 'Kategori Berhasil Diperbarui !');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:categorys,id',
        ]);

        $category = Categorys::findOrFail($request->id);
        $category->delete();

        return redirect('/dashboard/categorys')->with('sukses', 'Kategori Berhasil Dihapus !');
    }

    public function showProducts(Categorys $category)
    {
        $products = $category->products;

        return view('pages.dashboard.categorys.products', [
            "title" => "Categorys List",
            'category' => $category,
            'products' => $products,
        ]);
    }
}
