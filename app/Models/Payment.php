<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['registration_id', 'jumlah_bayar', 'tanggal_bayar', 'status_pembayaran', 'bukti_pembayaran'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
