<?php

namespace App\Http\Controllers;
use App\Models\Child;
use App\Models\Evolution;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    public static $gender;

//    public static function findChild($userId, $teamId)
    public static function findChild($teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->first();
    }

//    public static function getAllChild($userId, $teamId)
    public static function getAllChild($teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
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

//        self::$gender=Child::all()
//            ->where('id', $id)->value('gender');
    }

//    public static function getCurrentChild($userId, $teamId)
    public static function getCurrentChild($teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('first_name');
    }

//    public static function getGender($userId, $teamId)
    public static function getGender($teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('gender');
    }

    public static function getFIO($teamId)
    {
        $child = Child::all()
            //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->first();
        if($child)
            return $child->first_name . ' ' . $child->last_name;
        else
            return 'not child';
    }

    public static function getBirthday($teamId)
    {
        $birth = Child::all()
            //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('birthday');
        return stristr($birth, ' ', true);
    }

    public static function getGrowth($teamId)
    {
//        SELECT * FROM table ORDER BY date DESC
        $id = Child::all()
            //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('id');
//        dd($id);
//        return Evolution::all()
//            ->where('children_id', $id) //TODO
//            ->value('growth');
//        return Evolution::all()
//            ->where('children_id', $id) //TODO
//            ->where()
//            ->value('growth');
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
}
