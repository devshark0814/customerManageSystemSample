<?php

namespace App\Http\Controllers;

use App\Models\TCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

class TCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TCustomer::all();
        return $this->setResponse(MessageConst::MESSAGE_ID_00001, $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TCustomer::create($request->all());
        return response()->json([
            'message' => MessageConst::MESSAGE_ID_00002
        ]);
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
        $data = TCustomer::find($request->id);
        $result = $data->fill($request->all())->save();
        if(!$result) {
            return $this->setResponse(MessageConst::MESSAGE_ID_00005);
        }
        return $this->setResponse(MessageConst::MESSAGE_ID_00004);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = TCustomer::find($request->id);
        $result = $data->delete();
        if(!$result) {
            return $this->setResponse(MessageConst::MESSAGE_ID_00007);
        }
        return $this->setResponse(MessageConst::MESSAGE_ID_00006);
    }
}
