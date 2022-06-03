<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::with(['categories', 'user'])->paginate(10);
        $response = [
            'message' => 'List all Article data',
            'data' => $data,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function show($id)
    {
        $data = Article::with(['categories', 'user'])->findOrFail($id);
        $response = [
            'message' => 'Detail of Article data',
            'data' => $data,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required'],
            'image' => ['image', 'max: 10240'],
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        };

        try {
            if($request->file('image')){
                $image_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('image'), $image_name);
            } else {
                $image_name = NULL;
            }

            $data = new Article;
            $data->title = $request->title;
            $data->content = $request->content;
            $data->image = $image_name;
            $data->category_id = $request->category;
            $data->user_id = $request->user;
            $data->created_at = Carbon::now();
            $data->created_by = $request->name;
            $data->save();
            $response = [
                'message' => 'Article successfully created.',
                'data' => $data
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '. $e->errorInfo
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Article::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required'],
            'image' => ['image', 'max: 10240'],
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        };

        try {
            if($request->file('image')){
                $image_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('/image'), $image_name);
                $old_image = public_path('/image').$data->image;
                if(File::exists($old_image)) {
                    File::delete($old_image);
                }
            } else {
                $image_name = $data->image;
            }

            $data->title = $request->title;
            $data->content = $request->content;
            $data->image = $image_name;
            $data->category_id = $request->category;
            $data->user_id = $request->user;
            $data->updated_at = Carbon::now();
            $data->updated_by = $request->name;
            $data->update();
            $response = [
                'message' => 'Article successfully updated.',
                'data' => $data
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '. $e->errorInfo
            ]);
        }
    }

    public function destroy($id)
    {
        $data = Article::findOrFail($id);
        try {
            $data->delete();
            $response = [
                'message' => 'Article successfully deleted.',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '. $e->errorInfo
            ]);
        }
    }
}
