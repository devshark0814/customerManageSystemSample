<?php

namespace App\Repositories\TCustomer;

use App\Models\TCustomer;

class TCustomerRepository implements TCustomerRepositoryInterface
{

    protected $tCustomer;

    /**
     * construct
     *
     * @param TCustomer $tCustomer 
     */
    public function __construct(TCustomer $tCustomer)
    {
        $this->tCustomer = $tCustomer;
    }

    /**
     * 全データを返す
     *
     * @return void
     */
    public function getAll()
    {
        return $this->tCustomer::orderBy('id')->get();
    }

    /**
     * 新規登録
     *
     * @param mixed $obj 
     * @return void
     */
    public function store($obj)
    {
        TCustomer::create($obj);
    }

    /**
     * 更新
     *
     * @param mixed $obj 
     * @return void
     */
    public function update($obj)
    {
        $data = TCustomer::find($obj->id);
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
        $data = TCustomer::find($obj->id);
        return $data->delete();
    }
}