<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

use App\Repositories\TCustomer\TCustomerRepositoryInterface;
class TCustomerController extends Controller
{

    /**
     * construct
     *
     * @param TCustomerRepositoryInterface $repository 
     */
    public function __construct(TCustomerRepositoryInterface $repository)
    {
        $this->repo = $repository;
    }

    /**
     * 一覧用に全データを取得
     *
     * @return void
     */
    public function index()
    {
        $datas = $this->repo->getAll();
        return $this->setResponse(MessageConst::MESSAGE_ID_00001, $datas);
    }

    /**
     * 顧客情報登録
     *
     * @param Request $request 
     * @return void
     */
    public function store(Request $request)
    {
        $this->repo->store($request->all());
        return $this->setResponse(MessageConst::MESSAGE_ID_00002);
    }

    /**
     * 顧客情報更新
     *
     * @param Request $request 
     * @param TCustomer $tCustomer 
     * @return void
     */
    public function update(Request $request)
    {
        $result = $this->repo->update($request);
        if(!$result) {
            return $this->setResponse(MessageConst::MESSAGE_ID_00005);
        }
        return $this->setResponse(MessageConst::MESSAGE_ID_00004);
    }

    /**
     * 顧客情報削除
     *
     * @param Request $request 
     * @return void
     */
    public function destroy(Request $request)
    {
        $result = $this->repo->delete($request);
        if(!$result) {
            return $this->setResponse(MessageConst::MESSAGE_ID_00007);
        }
        return $this->setResponse(MessageConst::MESSAGE_ID_00006);
    }
}
