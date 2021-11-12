<?php

namespace App\Services;

use App\Models\Expenditure;
use App\Models\Operation;

class CommandFinalOperationExpenditureOneTime
{
    //получаем массив расходов и вынимаем неоходимые нам данные сумму и дату
    public function getOneTimeOperations($userId): array
    {
        $operationsOneTime = [];

        $operations = Operation::query()
            ->where('period', '=', 'one-time')
            ->where('type', '=', 'expenditure')
            ->where('user_id', '=', $userId)
            ->get();

        foreach ($operations as $operation) {
            $operationsOneTime[$operation->id] = [
                'id'=>$operation->id,
                'user_id'=>$operation->user_id,
                'sum' => $operation->sum,
                'date' => $operation->updated_at,
                'type' =>$operation->type
            ];
        }
        dd($operationsOneTime);
        return $operationsOneTime;
    }

    //удалим предыдущие записи из БД для пользователя
    public function deleteOldExpenditureOneTime($userId): void
    {
        Expenditure::query()
            ->where('user_id', $userId)
            ->delete();
    }

    //вставим новые записи для пользователя
    public function insertFinalOperationsExpenditureOneTime(array $operationsOneTime, $userId): void
    {
        foreach ($operationsOneTime as $operation) {
            Expenditure::query()
                ->insert([
                    'user_id' => $userId,
                    'sum'=> $operation['sum'],
                    'date'=>$operation['date'],
                    'type'=>$operation['type']
                ]);
        }
    }
}
