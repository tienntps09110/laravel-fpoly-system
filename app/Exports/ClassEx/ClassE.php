<?php

namespace App\Exports\ClassEx;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Http\Controllers\Core\Core;
use App\Model\ClassM;
use DB;

class ClassE implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $class = ClassM::where('soft_deleted', Core::false())
                        ->select(
                            'code',
                            'name',
                            DB::raw('DATE(`time_start`)'),
                            DB::raw('DATE(`time_end`)')
                        )
                        ->get();
        return $class;
    }
    public function headings(): array
    {
        return [
            'Mã lớp',
            'Tên lớp',
            'Thời gian bắt đầu',
            'Thời gian kết thúc'
        ];
    }
}
