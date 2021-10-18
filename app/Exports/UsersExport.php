<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery , WithHeadings ,WithMapping
{
    use Exportable;

    protected $users;

    public function __construct($users)
    {

        $this->users = $users;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Created_at'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone,
            $user->address,
            $user->created_at->format('d-m-Y'),

        ];
    }

    public function query()
    {
        return User::query()->whereKey($this->users);
    }
}
