<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RoleTableComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.role-table-component')->layout('layouts.admin-base');
    }
}
