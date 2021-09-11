<?php

namespace App\Repositories\TContract;

interface TContractRepositoryInterface
{
    /** 全レコードを返す */
    public function getAll();

    /** 新規登録 */
    public function store($obj);

    /** 更新 */
    public function update($obj);

    /** 削除 */
    public function delete($obj);
}