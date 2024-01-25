<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class CatalogsController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:catalogs',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        Catalogs::create($validatedData);

        return redirect('/dashboard/catalogs')->with('sukses', 'Katalog Berhasil Ditambahkan !');
    }

    public function read()
    {
        return view('pages.dashboard.catalogs.index', [
            "title" => "Catalogs",
            'catalogs' => Catalogs::all()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('catalogs')->ignore($request->id),
            ],
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        $category = Catalogs::findOrFail($request->id);
        $category->update($validatedData);

        return redirect('/dashboard/catalogs')->with('sukses', 'Katalog Berhasil Diperbarui !');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:catalogs,id',
        ]);

        $category = Catalogs::findOrFail($request->id);
        $category->delete();

        return redirect('/dashboard/catalogs')->with('sukses', 'Katalog Berhasil Dihapus !');
    }

    public function showProducts(Catalogs $catalog)
    {
        $products = $catalog->products;

        return view('pages.dashboard.catalogs.products', [
            "title" => "Catalogs List",
            'catalog' => $catalog,
            'products' => $products,
        ]);
    }
}
