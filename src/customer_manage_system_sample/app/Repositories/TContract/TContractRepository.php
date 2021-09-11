<?php

namespace App\Repositories\TContract;

use Illuminate\Support\Facades\DB;
use App\Models\TContract;

class TContractRepository implements TContractRepositoryInterface
{

    public function __construct()
    {
        
    }

    public function getAll()
    {
        $sql = "
            select 
                t.id                as contract_id
                ,t.contract_title   as contract_title
                ,t.contract_desc    as contract_desc
                ,t.status           as status
                ,case
                    when t.status = 1 then '新規'
                    when t.status = 2 then '着手中'
                    when t.status = 3 then '確認中'
                    else '完了'
                end                 as status_name
                ,t.progress         as progress
                ,tc.id              as customer_id
                ,tc.customer_name   as customer_name
                ,me.id              as employee_id
                ,me.employee_name   as employee_name
                ,t.created_at       as created_at
                ,t.updated_at       as updated_at
            from 
                t_contracts t
                inner join t_customers tc
                    on t.customer_id = tc.id
                inner join m_employees me
                    on t.employee_id = me.id
            order by
                t.id
        ";
        $res = DB::select($sql);
        if(!$res) {
            $res = array();
        }
        return $res;
    }

    public function store($obj)
    {
        TContract::create($obj);
    }

    public function update($obj)
    {
        $data = TContract::find($obj->contract_id);
        return $data->fill($obj->all())->save();
    }

    public function delete($obj)
    {
        $data = TContract::find($obj->contract_id);
        return $data->delete();
    }
}