<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // all the post for all the users
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // vallidation
        $data = $request->validate([
            'title' => 'required|min:2|string',
            'body' => 'required|min:2|string'
        ]);

        // just to simulate from user table
        $data['author_id'] = 1;

        // creating the post in the database
        $post = Post::create($data);

        // send response
        return response()->json($post, 201);





        // all() method from the request for all property in the request body
        // $data = $request->all();


        // only() method for only selected property from the body
        // $data = $request->only('title');
        // return $data;



        //    TEST purpose
        // return response()->json([
        //     'message' => 'store method',
        //     'data' => [
        //         'id' => 2,
        //         'title' => $data['title'],
        //         'body' => $data['body']
        //     ]
        // ], 201);
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // select the post 
        $post = Post::findOrFail($id);

        return $post;





        // return response()->json([
        //     'message' => 'test message',
        //     'data' => [
        //         "title" => "Test",
        //         "body" => "post body"
        //     ]

        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2', //1st type of validation rule
            'body' => ['required', 'string', 'min:2'] //2nd type of validation rule
        ]);

        $post->update($data);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
