<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        //$this->viewHome();
        //$this->findChild();
        return view('home_test2', ['child' => $child = Child::all()]);
    }

    public function docs() {
        return view('docs_test2');
    }

    public function health() {
        return view('health_test2');
    }

    public function growth() {
        return view('growth_test2');
    }

    public function viewHome() {
        $view = User::find(2);
        //dd($view);
        $this->findChild();
    }

    public function findChild() {
        //dd('***************');
        $child = Child::all();
        foreach ($child as $v)
        {
            if($v->getAttribute('user_id')==2)
                dump($v);
        }
        //dd($child);
    }
}
