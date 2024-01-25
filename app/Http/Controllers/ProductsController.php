<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Products;
use App\Models\Blogs;
use App\Models\Catalogs;
use App\Models\Categorys;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard.index', [
            "title" => "Dashboard",
            "categorys" => Categorys::count(),
            "catalogs" => Catalogs::count(),
            "products" => Products::count(),
            "blogs" => Blogs::count(),
            "users" => Users::count()
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'categorys_id' => 'required|exists:categorys,id',
            'catalogs_id' => 'required|exists:catalogs,id',
        ]);

        $validatedData['price'] = preg_replace("/[^0-9]/", "", $validatedData['price']);

        // Set a default picture name
        $pictureName = 'none.jpg';

        // Check if a picture is uploaded
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('product'), $pictureName);
        }

        Products::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'picture' => $pictureName,
            'categorys_id' => $validatedData['categorys_id'],
            'catalogs_id' => $validatedData['catalogs_id'],
        ]);

        return redirect('/dashboard/products')->with('sukses', 'Produk Berhasil Ditambahkan');
    }

    public function read()
    {
        return view('pages.dashboard.products.index', [
            "title" => "Products",
            'products' => Products::all(),
            'categorys' => Categorys::all(),
            'catalogs' => Catalogs::all()
        ]);
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('products')->ignore($request->id)],
            'description' => 'nullable',
            'price' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'categorys_id' => 'required|exists:categorys,id',
            'catalogs_id' => 'required|exists:catalogs,id',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the product by ID
        $product = Products::findOrFail($request->id);

        // Check if a new picture is provided
        if ($request->hasFile('picture')) {
            // Move the uploaded file to the product directory
            $picture = $request->file('picture');
            $pictureName = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('product'), $pictureName);

            // Update the 'picture' attribute
            $product->picture = $pictureName;
        }

        // Update other attributes
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categorys_id = $request->categorys_id;
        $product->catalogs_id = $request->catalogs_id;

        // Save the changes to the database
        $product->save();

        return redirect('/dashboard/products')->with('sukses', 'Produk Berhasil Diperbarui');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $products = Products::findOrFail($request->id);
        $products->delete();

        return redirect('/dashboard/products')->with('sukses', 'Produk Berhasil Dihapus');
    }
}
