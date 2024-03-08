<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'News';

        // get data terbaru dari table news dari modal news
        $news = News::latest()->paginate(5);
        $category = Category::all();

        // compact berfungsi untuk mengirim data ke view
        // yang di ambil dari variable
        return view('home.news.index', compact(
            'title',
            'news',
            'category'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $title = 'News';

        // model category
        $category = Category::all();

        // compact berfungsi untuk mengirim data ke views
        return view('home.news.create', compact(
            'title',
            'category'
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
        //validate data
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        // upload image
        $image = $request->file('image');
        // fungsi untuk menyimpan image ke dalam folder public/news
        // fungsi hashName() berfungsi untuk memberikan nama acak pada image
        $image->storeAs('public/news', $image->hashName());

        // create data ke dalam table news
        News::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'image' => $image->hashName(),
            'content' => $request->content
        ]);

        return redirect()->route('news.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // title halaman show
        $title = 'News - Show';

        // get data by id  using model news
        // fungsi dari findOrFail adalah
        // jika data tidak di temukan maka akan menampilkan error 404
        $news = News::findOrFail($id);

        return view('home.news.show', compact(
            'title',
            'news'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get data by id
        $news = News::findOrFail($id);
        // show data category
        $category = Category::all();
        $title = 'News - Edit';
        return view('home.news.edit', compact(
            'title',
            'news',
            'category'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
