<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'resep';
    protected $fillable = [
        'judul', 'deskripsi', 'bahan', 'langkah_pembuatan', 'photo',
    ];

    public function Users()
    {
        return $this->belongsTo('App\User');
    }
}
