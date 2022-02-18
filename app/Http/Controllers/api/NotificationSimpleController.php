<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationSimpleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notification::all();
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
            'title' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $url = null;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $filePath = $request->file('picture')->storeAs( '/', $fileName, 'ftp');
            $url = env('FILE_UPLOAD_PATH', 'http://localhost/') . $filePath;
        }
        $notification = new Notification([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'thumbnailUrl' => $url,
        ]);
        $notification->save();
        return  response()->json(['message' => 'saved']);
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
        //
    }
}
