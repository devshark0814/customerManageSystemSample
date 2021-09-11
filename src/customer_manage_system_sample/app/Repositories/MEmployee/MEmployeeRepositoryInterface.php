<?php

namespace App\Repositories\MEmployee;

interface MEmployeeRepositoryInterface
{
    /** 全レコードを返す */
    public function getAll();

    /** 新規登録 */
    public function store($obj);

    /** 更新 */
    public function update($obj);

    /** データ削除 */
    public function delete($obj);
}