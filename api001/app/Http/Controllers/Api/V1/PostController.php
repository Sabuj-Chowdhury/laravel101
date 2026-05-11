<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            [
                'id' => 1,
                'title' => 'index title',
                'body' => 'index body'
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // all() method from the request for all property in the request body
        $data = $request->all();


        // only() method for only selected property from the body
        // $data = $request->only('title');
        // return $data;



        //    TEST purpose
        return response()->json([
            'message' => 'store method',
            'data' => [
                'id' => 2,
                'title' => $data['title'],
                'body' => $data['body']
            ]
        ], 201);
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'message' => 'test message',
            'data' => [
                "title" => "Test",
                "body" => "post body"
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2', //1st type of validation rule
            'body' => ['required', 'string', 'min:2'] //2nd type of validation rule
        ]);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->noContent();
    }
}
