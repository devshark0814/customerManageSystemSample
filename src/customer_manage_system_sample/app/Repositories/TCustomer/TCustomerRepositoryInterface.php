<?php

namespace App\Repositories\TCustomer;

interface TCustomerRepositoryInterface
{
    /** 全レコードを返す */
    public function getAll();

    /** 新規登録 */
    public function store($obj);

    /** 既存データの更新 */
    public function update($obj);

    /** データ削除 */
    public function delete($obj);

    /**
     * ステータスに該当するデータを返す
     *
     * @param mixed $statusCd （1:新規、2:処理中、3:確認中、4:完了）
     * @return void
     */
    public function getByStatus($statusCd);
}