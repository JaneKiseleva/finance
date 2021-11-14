<?php

namespace App\Services;

use App\Models\Cashflow;
use App\Models\Target;
use Illuminate\Database\Eloquent\Collection;

class CommandTarget
{
    //получаем массив целей
    public function getTargets($userId)
    {
        $targets = Target::query()
            ->where('user_id', '=', $userId)
            ->get();

        return $targets;
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
    public function getBalanceOnlySum($collectionsBalance, $targets): array
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
        foreach ($targets as $target) {
            $target_current_cost = $target->target_current_cost;
            $resultDate[$target->id] = $newCollectionBalance->where('balance', '>', $target_current_cost)->first();
            if(!isset($resultDate[$target->id])) {
                $resultDate[$target->id] = [
                    'date' => null,
                    'balance'=> 0
                ];
            }
        }
        return $resultDate;
    }

    //вставим новые записи для пользователя
    public function insertEstimatedTimeToReach(Collection $targets, $resultDate): void
    {
        foreach ($targets as $target) {
            $target->estimated_time_to_reach = $resultDate[$target->id]['date'];
            $target->save();
        }
    }
}
