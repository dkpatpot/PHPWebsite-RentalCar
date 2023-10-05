<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
 
class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::get();
        return new ArticleResource($articles);
    }

    // public function create()
    // {
    //     $this->authorize('create', Article::class);
    //     $categories = Category::all();
    //     return view('articles.create', compact('categories'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('create', Article::class);

        // $validated = $request->validate([
        //     'title' => ['required', 'max:255', 'min:5'],
        //     'description' => ['required', 'max:1000'],
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

 
        // $path = $request->file('image')->store('public/images');


        $article = new Article();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/article_images'), $filename);
            $article['image'] = $filename;
        }
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        // $newImageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $newImageName);

        // $article->image = $newImageName;

        $article->save();

        // $categories = $request->get('categories');
        // $category_ids = $this->syncTags($categories);
        // $article->categories()->sync($category_ids);

        if ($article->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Article saved successful with ID: ' . $article->id,
                'car_id' => $article->id
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Article saved failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if($article->id != null) {
            $article->view_count++;
            $article->save();
        }

        return new ArticleResource($article);
    }

    // public function edit(Article $article)
    // {
    //     $this->authorize('update', $article);

    //     // $tags = implode(', ', $post->tags->pluck('name')->all());

    //     $categories = Category::all();

    //     return view('articles.edit', ['article' => $article, 'categories' => $categories]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // $this->authorize('update', $post);

        // $validated = $request->validate([   
        //     'title' => ['required', 'max:255', 'min:5'],
        //     'description' => ['required', 'max:1000'],
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        // ]);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        // $article->user_id = $request->user()->id;
        // $newImageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $newImageName);
        // $article->image = $newImageName;
        $article->save();

        // $categories = $request->get('categories');
        // $category_ids = $this->syncTags($categories);
        // $article->categories()->sync($category_ids);

        if ($article->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Article updated successful with ID: ' . $article->id,
                'car_id' => $article->id
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Article updated failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $title = $article->title;
        if ($article->delete()) {
            return response()->json([
                'success' => true,
                'message' => "article {$title} deleted successfully"
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => "article {$title} deleted failed"
        ], Response::HTTP_BAD_REQUEST);
    }

    private function syncTags($categories)
    {
        $categories = explode(',', $categories);
        $categories = array_map(function($v) {
            // use Illuminate\Support\Str; ก่อน class
            return Str::ucfirst(trim($v));
        }, $categories);

        $category_ids = [];
        foreach($categories as $category_name) {
            $category = Category::where('name', $category_name)->first();
            if (!$category) {
                $category = new Category();
                $category->name = $category_name;
                $category->save();
            }
            $category_ids[] = $category->id;
        }
        return $category_ids;
    }

    // public function summarize() {
    //     $tags = Tag::get();
    //     return view('posts.summarize', ['tags' => $tags]);
    // }
    // public function piesummarize() {
    //     $tags = Tag::get();
    //     return view('posts.piesummarize', ['tags' => $tags]);
    // }

    // public function uploadImage(Post $post)
    // {
    //     # code...
    // }
    // public function likePost($id)
    // {
    //     $post = Post::find($id);
    //     $post->like_count++;
    //     $post->save();

    //     return redirect()->route('posts.show', ['post' => $post->id]);
    // }
}
