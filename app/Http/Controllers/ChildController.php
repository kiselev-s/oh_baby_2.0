<?php

namespace App\Http\Controllers;
use App\Models\Child;
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
}
