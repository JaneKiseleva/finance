<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Operation;
use Carbon\Carbon;

class CommandFinalOperationIncomeMonthly
{
    //получаем массив ежемесячных доходов
    public function getMonthlyOperations(int $userId): array
    {
        $operationsMonthly = [];

        $operations = Operation::query()
            ->where('period', '=', 'monthly')
            ->where('type', '=', 'income')
            ->where('user_id', '=', $userId)
            ->get();

        foreach ($operations as $operation) {
            $operationsMonthly[$operation->id] = [
                'name' => $operation->name,
                'user_id' => $userId,
                'date' => $operation->updated_at,
                'sum' => $operation->sum,
                'type' => $operation->type,
                'created_at' => $operation->created_at,
                'updated_at' => $operation->updated_at,
            ];
        }

        return $operationsMonthly;
    }

    //получаем массив разовых доходов
    public function getOneTimeOperations(int $userId): array
    {
        $operationsOneTime = [];

        $operations = Operation::query()
            ->where('period', '=', 'one-time')
            ->where('type', '=', 'income')
            ->where('user_id', '=', $userId)
            ->get();


        foreach ($operations as $operation) {
            $operationsOneTime[$operation->id] = [
                'name' => $operation->name,
                'user_id' => $userId,
                'date' => $operation->updated_at,
                'sum' => $operation->sum,
                'type' => $operation->type,
                'created_at' => $operation->created_at,
                'updated_at' => $operation->updated_at,
            ];
        }
        return $operationsOneTime;
    }

    //правим дату у массива с разовыми датами
    public function getFinalArrayOneTimeOperationsIncome(array $operationsOneTime)
    {
        foreach ($operationsOneTime as $operation) {
            $operation['date'] = new Carbon();
            $date = $operation['date']->firstOfMonth()->toDate()->format('Y-m-d');
        }
        return $date;
    }


    //делаем финальный массив со всеми элементами и обновленной датой.
    public function getFinalArrayMonthlyOperationsIncome(array $operationsMonthly, $userId): array
    {
        $operationArrayDate = [];
        $finalArrayOperationsMonthly = [];
        $countOfMonthsInYear = 12;
        $countOfYears = 5;
        $countTime = $countOfMonthsInYear * $countOfYears;

        foreach ($operationsMonthly as $operation) {

            $operationArrayUserId = array_fill(0, $countTime, $userId);
            $operationArrayName = array_fill(0, $countTime, $operation['name']);
            $operationArraySum = array_fill(0, $countTime, $operation['sum']);
            $operationArrayType = array_fill(0, $countTime, $operation['type']);
            $operationArrayCreatedAt = array_fill(0, $countTime, $operation['created_at']);
            $operationArrayUpdatedAt = array_fill(0, $countTime, $operation['updated_at']);

            for ($i = 0; $i < $countTime; $i++) {
                $date = $operation['date'];
                $operationArrayDate[] = date('Y-m-01', strtotime($date . "+" . $i . " month"));
            }

            for ($i = 0; $i < $countTime; $i++) {
                $finalArrayOperationsMonthly[] = [
                    'user_id' => $operationArrayUserId[$i],
                    'name' => $operationArrayName[$i],
                    'sum' => $operationArraySum[$i],
                    'type' => $operationArrayType[$i],
                    'date' => $operationArrayDate[$i],
                    'created_at' => $operationArrayCreatedAt[$i],
                    'updated_at' => $operationArrayUpdatedAt[$i]

                ];
            }
        }

        return $finalArrayOperationsMonthly;
    }

    //удалим предыдущие записи из БД для пользователя
    public function deleteOldIncomesMonthly($userId): void
    {
        Income::query()
            ->where('user_id', $userId)
            ->delete();
    }

    //вставим новые записи для пользователя
    public function insertFinalOperationsIncomes(array $finalArrayOperationsMonthly, array $operationsOneTime, $date, int $userId): void
    {
        foreach ($finalArrayOperationsMonthly as $operation) {
            Income::query()
                ->insert([
                    'user_id' => $userId,
                    'name' => $operation['name'],
                    'sum' => $operation['sum'],
                    'date' => $operation['date'],
                    'type' => $operation['type'],
                    'created_at' => $operation['created_at'],
                    'updated_at' => $operation['updated_at']
                ]);
        }

        foreach ($operationsOneTime as $operation) {
            Income::query()
                ->insert([
                    'user_id' => $userId,
                    'name' => $operation['name'],
                    'sum' => $operation['sum'],
                    'date' => $date,
                    'type' => $operation['type'],
                    'created_at' => $operation['created_at'],
                    'updated_at' => $operation['updated_at']
                ]);
        }
    }
}


