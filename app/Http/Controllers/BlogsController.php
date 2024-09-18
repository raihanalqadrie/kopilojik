<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    public function read()
    {
        return view('pages.dashboard.blogs.index', [
            "title" => "Blogs",
            "blogs" => Blogs::all()
        ]);
    }

    public function create_View(){
        return view('pages.dashboard.blogs.create', [
            "title" => "Blogs",
        ]);
    }

    public function update_View (Blogs $blogs){
        return view('pages.dashboard.blogs.update', [
            "title" => "Blogs",
            "blogs" => $blogs
            
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:blogs',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/'), $imageName);
        $validatedData['image'] = $imageName;
        $validatedData['users_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($validatedData['title']);
        Blogs::create($validatedData);
        return redirect('/dashboard/blogs')->with('sukses', 'Blog Berhasil Ditambahkan !');
    }

    public function update(Request $request)
    {
        $validatedData =  $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique('blogs')->ignore($request->id),
            ],
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $blog = Blogs::where('id',$request->id)->first();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $validatedData['image'] = $imageName;
        }
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $blog = Blogs::findOrFail($request->id);
        $blog->update($validatedData);

        return redirect('/dashboard/blogs')->with('success', 'Berita berhasil diperbarui.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:blogs,id',
        ]);

        $blogs = Blogs::findOrFail($request->id);
        $blogs->delete();

        return redirect('/dashboard/blogs')->with('sukses', 'Blog Berhasil Dihapus !');
    }
}
