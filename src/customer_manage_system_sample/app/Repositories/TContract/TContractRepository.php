<?php

namespace App\Repositories\TContract;

use Illuminate\Support\Facades\DB;

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
                ,t.progress         as progress
                ,tc.id              as customer_id
                ,tc.customer_name   as customer_name
                ,me.id              as employee_id
                ,me.employee_name   as employee_name
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
}