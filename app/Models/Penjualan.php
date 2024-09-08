<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_barang = 'PJL' . mt_rand(100000, 999999);
        });
    }

    protected $table = 'penjualan';

    protected $fillable = [
        'user_id',
        'total_transaksi',
        'uang_diterima',
        'kembalian',
        'tanggal_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
