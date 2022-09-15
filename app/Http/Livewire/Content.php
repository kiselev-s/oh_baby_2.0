<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Child;

class Content extends Component
{
    public function render()
    {
        $user = Auth::user();
        $teamId = $user->currentTeam->id;
        $children = Child::where('team_id', $teamId)->orderBy('selected', 'desc')->get();
        $child = $children
            ->where('team_id', $teamId)
            ->where('selected', true)
            ->first();
        $childName = $child->first_name;

        return view('livewire.content', [
            'children' => $children,
            'teamId' => $teamId,
            'userName' => $user->name,
            'child' => $child,
            'childName' => $childName,
        ]);
    }
}
