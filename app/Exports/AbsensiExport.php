<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class AbsensiExport implements FromCollection, WithHeadings
{
    /** @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $absensi = DB::table('absensi')
            ->join('user', 'absensi.user_id', '=', 'user.id')
            ->join('murid', 'murid.user_id', '=', 'user.id')
            ->join('kelas', 'kelas.id', '=', 'murid.kelas_id')
            ->select('absensi.id', 'user.fullname', 'kelas.nama', 'absensi.status', 'absensi.keterangan', 'absensi.created_at')
            ->get();

        return $absensi;
    }
    public function headings(): array
    {
        return [
            'ID', 'Nama', 'Kelas', 'Status', 'Keterangan', 'Created-at'
        ];
    }
}
