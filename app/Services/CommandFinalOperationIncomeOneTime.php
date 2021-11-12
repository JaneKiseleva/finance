<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Operation;
use Illuminate\Support\Facades\Http;

class CommandFinalOperationIncomeOneTime
{
    //получаем массив доходов и вынимаем неоходимые нам данные сумму и дату
    public function getOneTimeOperations(): array
    {
        $operationsOneTime = [];

        $operations = Operation::query()
            ->where('period', '=', 'one-time')
            ->where('type', '=', 'income')
//            ->where('user_id', '=', $userId)
            ->get();

        foreach ($operations as $operation) {
            $operationsOneTime[$operation->id] = [
                'name' => $operation->name,
                'user_id'=>$operation->user_id,
                'date' => $operation->updated_at,
                'sum' => $operation->sum,
                'type' =>$operation->type,
                'created_at' => $operation->created_at,
                'updated_at' => $operation->updated_at,
            ];
        }

        return $operationsOneTime;
    }

//    // получаем пользователя
//    public function getUserId(array $operationsOneTime) {
//        foreach ($operationsOneTime as $operation) {
//            $userId = $operation['user_id'];
//        }
////        return $userId;
//    }

    //удалим предыдущие записи из БД для пользователя
    public function deleteOldIncomesOneTime(): void
    {
            Income::query()
//                ->where('user_id', $userId)
                ->delete();
    }

    //вставим новые записи для пользователя
    public function insertFinalOperationsIncomeOneTime(array $operationsOneTime): void
    {
        foreach ($operationsOneTime as $operation) {
            Income::query()
                ->insert([
                    'user_id' => $operation['user_id'],
                    'name' => $operation['name'],
                    'sum' => $operation['sum'],
                    'date' => $operation['date'],
                    'type' => $operation['type'],
                    'created_at' => $operation['created_at'],
                    'updated_at' => $operation['updated_at']

                ]);
        }
    }
}
