<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama_lengkap', 'email', 'nomor_telepon', 'alamat', 'tanggal_lahir', 'jenis_kelamin'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
