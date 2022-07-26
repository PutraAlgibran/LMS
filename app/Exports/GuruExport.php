<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class GuruExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Guru::all();
    }
    public function headings(): array
    {
        return [
            'ID', 'Nama', 'Email', 'Telpon', 'User__Id', 'Created_at', 'Updated_at'
        ];
    }
}
