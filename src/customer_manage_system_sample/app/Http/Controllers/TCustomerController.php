<?php

namespace App\Http\Controllers;

use App\Models\TCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = TCustomer::all();
        return response()->json([
            'message' => '検索完了しました',
            'data' => $datas
        ]);
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
        //
        Log::info($request);

        TCustomer::create($request->all());
        return response()->json([
            'message' => '登録完了しました'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TCustomer  $tCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(TCustomer $tCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TCustomer  $tCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(TCustomer $tCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TCustomer  $tCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TCustomer $tCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TCustomer  $tCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(TCustomer $tCustomer)
    {
        //
    }
}
