<?php

namespace App\Http\Controllers;
use App\Models\Child;
use App\Models\Evolution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    public static $gender;

    public static function findChild($teamId)
    {
        return Child::all()
            ->where('team_id', $teamId)
            ->first();
    }

    public static function getAllChild($teamId)
    {
        return Child::all()
            ->where('team_id', $teamId);
    }

    public static function setCurrentChild($id)
    {
        $teamId = DB::table('children')->where('id', $id)
            ->value('team_id');

        DB::table('children')
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => false]);
            });

        DB::table('children')
            ->where('id', $id)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => true]);
            });
    }

    public static function getCurrentChild($teamId)
    {
        return Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('first_name');
    }

    public static function getGender($teamId)
    {
        return Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('gender');
    }

    public static function getFIO($teamId)
    {
        $child = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->first();
        if($child)
            return $child->first_name . ' ' . $child->last_name;
        else
            return 'Not child';//TODO
    }

    public static function getBirthday($teamId)
    {
        $birth = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('birthday');
        return stristr($birth, ' ', true);
    }

    public static function getGrowth($teamId)
    {
        $id = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('id');

        return DB::table('evolutions')
            ->where('children_id', $id)
            ->orderByDesc('created_at')
            ->value('growth');
    }

    public static function getWeight($teamId)
    {
        $id = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('id');

        return DB::table('evolutions')
            ->where('children_id', $id)
            ->orderByDesc('created_at')
            ->value('weight');
    }

    public static function getMeeting($teamId)
    {
        $id = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('id');

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

    public static function getHoliday($teamId)
    {
        $birth = Child::all()
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('birthday');
        $date = stristr($birth, ' ', true);

        return self::diff($date);
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
        $user = Auth::user();
        $team_id = $user->currentTeam->id;
        $children = Child::where('team_id', $team_id)->orderBy('selected', 'desc')->get();
        $child = $children
            ->where('team_id', $team_id)
            ->where('selected', true)
            ->first();
        if($child) {
            $child_name = $child->first_name;
            $gender = $child->gender;
        }
        else{
            $child_name = 'Not child';
            $gender = 1;
        }

        $data = [
            'user'=>$user,
            'team_id'=>$team_id,
            'children'=>$children,
            'child'=>$child,
            'child_name'=>$child_name,
            'gender'=>$gender,
        ];

        return $data;
    }
}
