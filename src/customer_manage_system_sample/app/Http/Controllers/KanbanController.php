<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

use App\Repositories\TCustomer\TCustomerRepositoryInterface;
class KanbanController extends Controller
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

    public function index()
    {
        $kanbanTypeArr = array(1,2,3,4);
        $kanbanNameArr = array("新規","進行中","対応中","完了");
        $res = array();

        $index = 0;
        foreach ($kanbanTypeArr as $key => $kanbanType) {
            $kanbanType = $kanbanTypeArr[$index];
            $kanbanName = $kanbanNameArr[$index];
            $datas = $this->repo->getByStatus($kanbanType);
            $datas = count($datas) == 0 ? array() : $datas;
            $resArr = array(
                "kanban_type" => $kanbanType,
                "kanban_name" => $kanbanName,
                "items" => $datas,
            );
            array_push($res, $resArr);
            $index++;
        }
        return $res;
    }
}
