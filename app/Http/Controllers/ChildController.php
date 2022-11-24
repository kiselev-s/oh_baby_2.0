<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    private static function getGrowth($id)
    {
        return DB::table('evolutions')
            ->where('children_id', $id)
            ->orderByDesc('created_at')
            ->value('growth');
    }

    private static function getWeight($id)
    {
        return DB::table('evolutions')
            ->where('children_id', $id)
            ->orderByDesc('created_at')
            ->value('weight');
    }

    private static function getMeeting($id)
    {
        $meeting =
            DB::table('healths')
                ->where('children_id', $id)
                ->orderByDesc('created_at')
                ->value('meeting');

        if($meeting != null)
            return $meeting;
        else
            return 'No meeting';
    }

    private static function diff($birthday) {
        $cd = new \DateTime('today'); // Сегодня, время 00:00:00
        $bd = new \DateTime($birthday); // Объект Дата дня рождения
        $bd->setDate($cd->format('Y'), $bd->format('m'), $bd->format('d')); // Устанавливаем текущий год, оставляем месяц и день
        $tmp = $cd->diff($bd); // Разница дат
        if($tmp->invert){ // Если в этом году уже был (разница "отрицательная")
            $bd->modify('+1 year'); // Добавляем год
            $tmp = $cd->diff($bd); // Снова вычисляем разницу
        }
        return $tmp->days; // Результат в днях
    }

    public static function data()
    {
        $child_id = 0;
        $user = Auth::user();
        $team_id = $user->currentTeam->id;
        $children = Child::where('team_id', $team_id)->orderBy('selected', 'desc')->get();
        $child = $children
            ->where('team_id', $team_id)
            ->where('selected', true)
            ->first();
        if($child) {
            $child_name = $child->first_name;
            $child_id = $child->id;
            $child_last_name = $child->last_name;
            $gender = $child->gender;
            $fio = $child_name . ' ' . $child_last_name;
            $birthday = $child->birthday;
            $holiday = self::diff(stristr($birthday, ' ', true));
            $weight = self::getWeight($child_id);
            $growth = self::getGrowth($child_id);
            $meeting = self::getMeeting($child_id);
        }
        else{
            $child_name = 'Not child';
            $child_last_name = 'No last name';
            $gender = 1;
            $fio = 'Not child';
            $birthday = 'Not birthday';
            $holiday = 'No holiday';
            $weight = 'No weight';
            $growth = 'No growth';
            $meeting = 'No meeting';
        }
        $data = [
            'user' => $user,
            'team_id' => $team_id,
            'children' => $children,
            'child' => $child,
            'child_name' => $child_name,
            'child_id' => $child_id,
            'gender' => $gender,
            'child_last_name' => $child_last_name,
            'fio' => $fio,
            'birthday' => stristr($birthday, ' ', true),
            'holiday' => $holiday,
            'weight' => $weight,
            'growth' => $growth,
            'meeting' => $meeting,
        ];

        return $data;
    }
}
