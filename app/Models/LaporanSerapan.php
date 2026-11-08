<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanSerapan extends Model
{
    protected $table = 'laporan_serapan';

    protected $primaryKey = 'id_laporan';

    public $timestamps = false;

    protected $fillable = [
        'bulan',
        'tahun',
        'total_transaksi',
        'total_pendapatan',
        'total_ppn_dipungut',
        'total_pph23_dipotong',
        'total_pph21_dipotong',
        'total_bagi_hasil_inovator',
    ];

    protected function casts(): array
    {
        return [
            'bulan' => 'integer',
            'tahun' => 'integer',
            'total_transaksi' => 'integer',
            'total_pendapatan' => 'decimal:2',
            'total_ppn_dipungut' => 'decimal:2',
            'total_pph23_dipotong' => 'decimal:2',
            'total_pph21_dipotong' => 'decimal:2',
            'total_bagi_hasil_inovator' => 'decimal:2',
        ];
    }
}
