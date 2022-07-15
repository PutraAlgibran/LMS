<?php

namespace App\Exports;

use App\Models\users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return users::all();
    }
    public function headings(): array
    {
        return [
            'ID', 'Fullname', 'Role', 'Nis', 'Nip', 'Username', 'Email', 'Telpon', 'Alamat', 'Password', 'Foto', 'Updated-at', 'Created-at'
        ];
    }
}
