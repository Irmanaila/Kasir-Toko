<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
            $model->id_detail_penjualan = 'DJL' . mt_rand(100000, 999999);
        });
    }

    protected $table = 'detail_penjualan';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'kuantitas',
        'harga_jual',
    ];


    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'id_penjualan');
    }

    // Relasi ke model Item
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function scopeForCurrentUser($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
