<?php

namespace App\Http\Controllers;
use App\Models\Child;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static $gender;

    public static function findChild($userId, $teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->first();
    }

    public static function getAllChild($userId, $teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId);
    }

    public static function setCurrentChild($id)
    {
        $teamId = DB::table('children')->where('id', $id)
            ->value('team_id');

        DB::table('children')->where('team_id', $teamId)
            ->where('selected', true)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => false]);
            });

        DB::table('children')->where('id', $id)
            ->lazyById()
            ->each(function ($child) {
                DB::table('children')
                    ->where('id', $child->id)
                    ->update(['selected' => true]);
            });

//        self::$gender=Child::all()
//            ->where('id', $id)->value('gender');
    }

    public static function getCurrentChild($userId, $teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('first_name');
    }

    public static function getGender($userId, $teamId)
    {
        return Child::all()
          //  ->where('user_id', $userId)
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->value('gender');
    }
}
