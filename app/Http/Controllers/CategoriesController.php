<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Events\QueryExecuted;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::with('user')->paginate(10);
        $response = [
            'message' => 'List all Categories data',
            'data' => $data,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'user' => ['required', 'numeric'],  
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        };

        try {
            $data = Categories::create([
                'name' => $request->name,
                'user_id' => $request->user,
                'created_at' => Carbon::now(),
                'created_by' => $request->username,
            ]);
            $response = [
                'message' => 'Categories successfully created',
                'data'  => $data,
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Categories::with('user')->findOrFail($id);
        $response = [
            'message' => 'Detail of Categories data',
            'data' => $data,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Categories::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'user' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        };

        try {
            $data->update([
                'name' => $request->name,
                'user_id' => $request->user,
                'updated_at' => Carbon::now(),
                'updated_by' => $request->username,
            ]);
            $response = [
                'message' => 'Categories successfully updated',
                'data'  => $data,
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $data = Categories::findOrFail($id);
        
        try{
            $data->delete([
                'deleted_by' => $request->username,
                'deleted_at' => Carbon::now(),
            ]);
            $response = [
                'message' => 'Categories successfully deleted',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo
            ]);
        }
    }
}
