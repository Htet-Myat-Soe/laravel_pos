<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\Role;

class UserCreateComponent extends Component
{

    public $name;
    public $email;
    public $phone;
    public $password;
    public $address;


    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|min:11',
            'address' => 'required'
        ]);
    }

    public function resetForm(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->phone = "";
        $this->address = "";
    }

    public function createUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|min:11',
            'address' => 'required'

        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->phone = $this->phone;
        $user->address = $this->address;
        $role = Role::where('id',5)->first();
        $user->syncRoles($role);
        $user->save();

        $this->resetForm();

        return back()->with(['user_created' => 'User Created Successfully']);


    }
    public function render()
    {
        return view('livewire.admin.user-create-component')->layout('layouts.admin-base');
    }
}
