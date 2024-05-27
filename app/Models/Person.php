<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_trankssaksi',
        'total_pengeluaran',
        'metode_pembayaran',
        'catatan',
    ];
}
