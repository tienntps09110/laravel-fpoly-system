<?php

namespace App\Exports\Teacher;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Http\Controllers\Core\Core;
use App\User;

class Teachers implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::where('soft_deleted', Core::false())
                    ->select('uuid', 'full_name', 'email', 'phone_number')
                    ->get();
        
        $arrayUser = [];

        foreach($users as $user){
            $role = Core::role($user)->name;
            unset($user->uuid);
            $user->role_name = $role;
            $arrayUser[] = $user;
        }
        
        $arrayUser = collect($arrayUser)->sortByDesc('role_name')->values()->all();

        return (object) $arrayUser;
    }

    public function headings(): array
    {
        return [
            'Tên',
            'Email',
            'Số điện thoại',
            'Chức vụ'
        ];
    }
}
