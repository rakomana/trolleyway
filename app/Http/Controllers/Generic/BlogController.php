<?php

namespace App\Http\Controllers\Generic;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Generic\Blog\BlogStoreRequest;

class BlogController extends Controller
{
    /**
     * @var $blog
     * @var $db
    */
    private $blog;
    private $db;

    /**
     * Inject models into the constructor
     * @param Blog $blog
     * @param DB $db
    */
    public function __construct(Blog $blog, DB $db)
    {
        $this->blog = $blog;
        $this->db = $db;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $blog = new $this->blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description_1 = $request->description_1;
        $blog->description_2 = $request->description_2;

        //Upload article image to storage
        $media = $request->file('image');
        $image = $media->getClientOriginalName();
        $media->move('uploads/blog/',$image);
        $blog->image = $image;

        $blog->save();

        return back()->with('success', 'Article created succesfully');
    }

    /**
     * Display resources.
     *
     * @return \Illuminate\Http\View
    */
    public function index()
    {
        $blogs = $this->blog->all();
        
        return view('user.blog', compact('blogs'));
    }

    /**
     * Display resources.
     *
     * @return \Illuminate\Http\View
    */
    public function indexOnAdmin()
    {
        $blogs = $this->blog->all();
        
        return view('admin.blog', compact('blogs'));
    }

    /**
     * Display resources.
     *
     * @return \Illuminate\Http\View
    */
    public function indexOnAddAdmin()
    {
        return view('admin.add-blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  Blog $blog
     * @return \Illuminate\Http\View
     */
    public function show(Blog $blog)
    {
        $comments = DB::table('blog_comments')->where('blog_id', $blog->id)->get();

        return view('user.blog-details', compact('blog', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->back()->with('success', 'Article updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->back()->with('success', 'Article deleted succesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, Blog $blog)
    {
        $user = $request->user();

        $user->blogs()->attach($blog, array(
            'comment' => $request->comment
        ));

        return back();
    }
}
