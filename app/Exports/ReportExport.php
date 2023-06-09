<?php

namespace App\Exports;

use App\Models\Reports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Reports::join('destinations', 'destinations.id', '=', 'reports.id_destination')
        ->select('name', 'date', 'count')
        ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Destinasi',
            'Tanggal',
            'Jumlah',
            // Tambahkan header lainnya sesuai kebutuhan
        ];
    }
}
