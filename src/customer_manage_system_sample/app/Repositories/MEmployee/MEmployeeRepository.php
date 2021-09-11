<?php

namespace App\Repositories\MEmployee;

use App\Models\MEmployee;

class MEmployeeRepository implements MEmployeeRepositoryInterface
{

    protected $mEmployee;

    /**
     * construct
     *
     * @param MEmployee $tCustomer 
     */
    public function __construct(MEmployee $mEmployee)
    {
        $this->mEmployee = $mEmployee;
    }

    /**
     * 全データを返す
     *
     * @return void
     */
    public function getAll()
    {
        return $this->mEmployee::orderBy('id')->get();
    }
}