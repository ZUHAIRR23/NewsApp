<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // title halaman index
        $title = 'Category';

        // megurutkan data bedasarkan data terbaru dengan paginate
        $category = Category::latest()->paginate(5);
        return view('home.category.index', compact(
            'category',
            'title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // title halaman create
        $title = 'Create';

        return view('home.category.create', compact(
            'title'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $this->validate($request, [
            'name' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // melakukan upload image
        $image = $request->file('image');
        // menyimpan image yang di upload ke folder storage/app/public/category 
        // fungsi hashName untuk generate nama yang unik
        // fungsi getClientOriginalName itu menggunakan nama asli dari image
        $image->storeAs('public/category', $image->hashName());
        
        // melakukan save to database
        Category::create([
            'name' => $request->name,
            'slug' => Str::singular($request->name),
            'image' => $image->hashName()
        ]);

        // melakukan return redirect
        return redirect()->route('category.index')
            ->with('success', 'Category Berhasil Ditambahkan');
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
        //title halaman edit
        $title = 'Edit';

        // get category data by id
        // fungsi get data by id adalah mengambil data berdasarkan id yang di inputkan
        $category = Category::find($id);

        return view('home.category.edit', compact(
            'category',
            'title'
        ));
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
        // melakukan validai data
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // get data category by id
        $category = Category::find($id);

        // jika image kosong tidak di update
        if($request->file('image') == '') {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

            return redirect()->route('category.index');

        } else {
            // jika gambarnya di update
            // hapus image lama
            Storage::disk('local')->delete('public/category/' .basename($category->image));

            // upload image baru
            $image = $request->file('image');
            $image->storeAs('public/category/', $image->hashName());

            // update data
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image->hashName()
            ]);

            return redirect()->route('category.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get data by id
        $category = Category::find($id);

        // delete image
        // basename itu untuk mengambil nama file
        Storage::disk('local')->delete('public/category/'. basename($category->image));

        // delete data by id
        $category->delete();

        return redirect()->route('category.index');
    }
}
