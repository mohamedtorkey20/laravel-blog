<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Posts;
use Carbon\Carbon;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $posts = Post::paginate(10);

    $user_Id = Auth::id();
    return view('posts.index', compact('posts', 'user_Id'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'image' => 'nullable|image'
            ]);

            $validatedData['enabled'] = $request->has('enabled') ? 1 : 0;
            $imgUrl = null;
        if ($request -> has('image') && $request -> file('image') -> isValid())
        {
            $imgUrl = $request -> file('image') -> store('posts',['disk' => 'public']);
        }

            $user_Id=Auth::id();


            Post::create(['title' => $validatedData['title'],
            'body' =>$validatedData['body'],
            'user_id'=>$user_Id,'image'=>$imgUrl,
            'enabled' => $validatedData['enabled']]);
            return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */




    public function show(string $id)
    {

        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'enabled' => 'required',
            ]);

        $post = Post::find($id);
        $post->update($validatedData);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function trash()
     {
        $deletedPosts = Post::onlyTrashed()->get();
         return view('posts.trash', compact('deletedPosts'));
     }

     public function destroy(string $id)
     {
         Post::find($id)->delete();

         return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
     }


     public function restore($id)
     {

         $post = Post::withTrashed()->findOrFail($id);


         $post->restore();


         return redirect()->back()->with('success', 'Post restored successfully');
     }


     public function deletePermanently($id)
     {

         $post = Post::withTrashed()->findOrFail($id);


         $post->forceDelete();


         return redirect()->back()->with('success', 'Post permanently deleted');
     }
}
