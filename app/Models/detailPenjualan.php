<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPenjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detail_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_barang = 'DJL' . mt_rand(100000, 999999);
        });
    }

    protected $table = 'barang';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'kuantitas',
        'harga_jual',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
