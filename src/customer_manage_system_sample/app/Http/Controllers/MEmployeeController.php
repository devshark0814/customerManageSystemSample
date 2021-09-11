<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

use App\Repositories\MEmployee\MEmployeeRepositoryInterface;

class MEmployeeController extends Controller
{

    /**
     * construct
     *
     * @param TCustomerRepositoryInterface $repository 
     */
    public function __construct(MEmployeeRepositoryInterface $repository)
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
}
