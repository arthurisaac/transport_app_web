<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::all();
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
            'articleId' => 'required',
            'userAddressMail' => 'required',
            'userPhoneNumber' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
        ]);
        $order = new Order([
            'articleId' => $request->get('articleId'),
            'userAddressMail' => $request->get('userAddressMail'),
            'userPhoneNumber' => $request->get('userPhoneNumber'),
            'quantity' => $request->get('quantity'),
            'amount' => $request->get('amount'),
            'deliveryAddress' => $request->get('deliveryAddress'),
            'methodOfPayment' => $request->get('methodOfPayment'),
            'confirmationMessage' => $request->get('confirmationMessage'),
        ]);
        $order->save();
        $this->sendMail($request->get("userAddressMail"));
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
