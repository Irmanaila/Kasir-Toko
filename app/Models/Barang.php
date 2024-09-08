<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_barang = 'BRG' . mt_rand(100000, 999999);
        });
    }

    protected $table = 'barang';

    protected $fillable = [
        'user_id',
        'kode_barang',
        'nama_barang',
        'foto',
        'harga_modal',
        'harga_jual',
        'stok',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeForCurrentUser($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
