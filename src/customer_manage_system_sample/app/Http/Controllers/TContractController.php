<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

use App\Repositories\TContract\TContractRepositoryInterface;

class TContractController extends Controller
{

    public function __construct(TContractRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $datas = $this->repo->getAll();
        return $this->setResponse(MessageConst::MESSAGE_ID_00001, $datas);
    }
}
