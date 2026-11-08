<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenPajak extends Model
{
    protected $table = 'dokumen_pajak';

    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'id_pesanan',
        'jenis_faktur',
        'no_seri_efaktur_dp',
        'file_efaktur_dp',
        'nominal_ppn_dp',
        'no_seri_efaktur_pelunasan',
        'file_efaktur_pelunasan',
        'nominal_ppn_pelunasan',
        'total_nominal_ppn',
        'no_bukti_potong_pph23',
        'file_bukti_potong',
        'nominal_bukti_potong',
        'status_dokumen',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'nominal_ppn_dp' => 'decimal:2',
            'nominal_ppn_pelunasan' => 'decimal:2',
            'total_nominal_ppn' => 'decimal:2',
            'nominal_bukti_potong' => 'decimal:2',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
