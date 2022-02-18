<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return response()->json($data);
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
        $request->validate([
            'label' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $url = null;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $filePath = $request->file('picture')->storeAs( '/', $fileName, 'ftp');
            $url = env('FILE_UPLOAD_PATH', 'http://localhost/') . $filePath;
        }
        $article = new Article([
            'label' => $request->get('label'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'stock' => $request->get('stock'),
            'location' => $request->get('location'),
            'coordinates' => $request->get('coordinates'),
            'views' => $request->get('views'),
            'shares' => $request->get('shares'),
            'measure' => $request->get('measure'),
            'categoryId' => $request->get('categoryId'),
            'thumbnailUrl' => $url,
        ]);
        $article->save();
        return response()->json(['message' => 'saved'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::query()
            ->where('categoryId', $id)
            ->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Article::query()->find($id);
        if ($data) $data->delete();
        return response()->json([
            'message' => 'deleted'
        ]);
    }
}
