<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;

class UserProfileTables extends Component
{
    public function render()
    {
        $userProfileTable = Profile::all();
        return view('livewire.user-profile-table',['userProfileTable'=>$userProfileTable]);
    }
}
