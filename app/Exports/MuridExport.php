<?php

namespace App\Exports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MuridExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $murid = DB::table('murid')
            ->join('user', 'murid.user_id', '=', 'user.id')
            ->join('kelas', 'kelas.id', '=', 'murid.kelas_id')
            ->select('murid.id', 'user.fullname', 'kelas.nama', 'user.telpon')
            ->get();

        return $murid;
    }
    public function headings(): array
    {
        return [
            'ID', 'Nama', 'Kelas', 'Telpon'
        ];
    }
}
