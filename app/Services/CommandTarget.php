<?php

namespace App\Services;

use App\Models\Cashflow;
use App\Models\Target;

class CommandTarget
{
    //получаем массив целей
    public function getTargets($userId)
    {
        $allTargets = [];

        $targets = Target::query()
            ->where('user_id', '=', $userId)
            ->get();

        foreach ($targets as $target) {
            $allTargets[$target->id] = [
                'id' => $target->id,
                'name' => $target->name,
                'user_id'=>$userId,
//                'user_id' => $target->user_id,
                'target_current_cost' => $target->target_current_cost,
                'planned_date' => $target->planned_date,
                'estimated_time_to_reach' => $target->estimated_time_to_reach,
                'created_at' => $target->created_at,
                'updated_at' => $target->updated_at,
            ];
        }
        return $allTargets;
    }

    //получаем коллекцию баланс из базы по месяцам
    public function getBalance($userId)
    {
        $balanceOnMonths = Cashflow::query()
            ->where('user_id', '=', $userId)
            ->get();

        //группируем значения по ключу, где ключ дата, а значения вся информация о доходе.
        $collectionsBalance = $balanceOnMonths->keyBy('date');

        return $collectionsBalance;
    }

    //рассчитываем месяц исполнения цели
    public function getBalanceOnlySum($collectionsBalance, $allTargets): array
    {
        $resultDate = [];
        $dinamicBalance = 0;
        $newArrayBalance = [];


        //массив с ключами датами и значением суммами
        foreach ($collectionsBalance as $date => $value) {
            $dinamicBalance += $value['balance'];
            $newArrayBalance[] = ['date' => $date, 'balance' => $dinamicBalance];
        }

        //коллекция массивов из массива массивов
        $newCollectionBalance = collect($newArrayBalance);

        //стоимость цели
        foreach ($allTargets as $target) {
            $target_current_cost = $target['target_current_cost'];
            $resultDate[$target['id']] = $newCollectionBalance->where('balance', '>', $target_current_cost)->first();
            if(!isset($resultDate[$target['id']])) {
                $resultDate[$target['id']] = [
                    'date' => null,
                    'balance'=> 0
                ];

            }
        }

        return $resultDate;
    }

    //удалим предыдущие записи из БД для пользователя
    public function deleteTarget($userId): void
    {
        Target::query()
            ->where('user_id', $userId)
            ->delete();
    }

    //вставим новые записи для пользователя
    public function insertEstimatedTimeToReach(array $allTargets, $resultDate, $userId): void
    {

        foreach ($allTargets as $target) {
            $targetForSave = new Target();
            $targetForSave->user_id = $userId;
            $targetForSave->name = $target['name'];
            $targetForSave->target_current_cost = $target['target_current_cost'];
            $targetForSave->planned_date = $target['planned_date'];
            $targetForSave->estimated_time_to_reach = $resultDate[$target['id']]['date'];

            $targetForSave->save();
        }
    }


}
