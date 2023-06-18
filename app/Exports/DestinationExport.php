<?php

namespace App\Exports;

use App\Models\Reports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class DestinationExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reports::select('count', 'date', 'content')
        ->get();
    }

    public function headings(): array
    {
        return [
            'Jumlah Pengunjung',
            'Tanggal',
            'Keterangan',
            // Tambahkan header lainnya sesuai kebutuhan
        ];
    }
}
