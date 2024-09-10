<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_penjualan = 'PJL' . mt_rand(100000, 999999);
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

    public function detailPenjualan()
    {
        return $this->hasMany(detailPenjualan::class, 'penjualan_id', 'id_penjualan');
    }

    public function scopeForCurrentUser($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
