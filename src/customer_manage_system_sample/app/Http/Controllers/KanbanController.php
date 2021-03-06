<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Const\MessageConst;

use App\Repositories\TContract\TContractRepositoryInterface;
class KanbanController extends Controller
{

    private $repo;

    /**
     * construct
     *
     * @param TContractRepositoryInterface $repository 
     */
    public function __construct(TContractRepositoryInterface $repository)
    {
        $this->repo = $repository;
    }

    public function index()
    {
        $res = array();
        
        $_datas = $this->repo->getAll();
        Log::info($_datas);

        $kanbanTypeArr = array(1,2,3,4);
        $kanbanNameArr = array("新規","着手中","確認中","完了");
        $index = 0;

        foreach ($kanbanTypeArr as $key => $kanbanType) {
            $kanbanType = $kanbanTypeArr[$index];
            $kanbanName = $kanbanNameArr[$index];
            $datas = collect($_datas)->where('status', $kanbanType)->values()->toArray();
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
