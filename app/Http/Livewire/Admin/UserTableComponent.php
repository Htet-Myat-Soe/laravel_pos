<?php

namespace App\Http\Livewire\Admin;

use App\Exports\UsersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;
use Livewire\WithPagination;

class UserTableComponent extends Component
{

    public $page_amount = 20;
    public $users_search = '';
    public $checked = [];
    public $selectPage = false;

    use WithPagination;

    public function updatedSelectPage($value){
        if($value){
            $this->checked = User::where('is_admin',0)->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        }
        else{
            $this->checked = [];
        }
    }

    public function isChecked($user_id){
        return in_array($user_id,$this->checked);
    }

    public function updatedChecked(){
        $this->selectPage = false;
    }

    public function exportExcel(){
        if ($this->checked) {
            return (new UsersExport($this->checked))->download('users.xlsx');
        }
        else{
            $this->emit('please_select');
        }
    }

    public function exportPDF(){
        if ($this->checked) {
            return (new UsersExport($this->checked))->download('users.pdf');
        }
        else{
            $this->emit('please_select');
        }

        // $users = User::whereIn('id',$this->checked)->get();
        // $pdf = PDF::loadView('livewire.admin.print-pdf.users',['users' => $users]);
        // return $pdf->download('users.pdf');
    }

    public function render()
    {
        if($this->users_search){
            $users = User::orderBy('created_at','DESC')->where('is_admin',0)
            ->where('name','LIKE',"%$this->users_search%")->paginate($this->page_amount);
        }
        else{
            $users = User::orderBy('created_at','DESC')->where('is_admin',0)->paginate($this->page_amount);
        }
        return view('livewire.admin.user-table-component',['users' => $users])->layout('layouts.admin-base');
    }
}
