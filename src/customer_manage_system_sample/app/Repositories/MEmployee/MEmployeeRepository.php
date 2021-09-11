<?php

namespace App\Repositories\MEmployee;

use App\Models\MEmployee;

use Illuminate\Support\Facades\Log;

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

    /**
     * 新規登録
     *
     * @param mixed $obj 
     * @return void
     */
    public function store($obj)
    {
        MEmployee::create($obj);
    }

    /**
     * 更新
     *
     * @param mixed $obj 
     * @return void
     */
    public function update($obj)
    {
        $data = MEmployee::find($obj->id);
        return $data->fill($obj->all())->save();
    }

    /**
     * 削除
     *
     * @param mixed $obj 
     * @return void
     */
    public function delete($obj)
    {
        $data = MEmployee::find($obj->id);
        return $data->delete();
    }
}