<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;

    protected $table = "riwayat";
    protected $fillable = [
        'judul',
        'tipe',
        'tgl_mulai',
        'tgl_selesai',
        'info_1',
        'info_2',
        'info_3',
        'isi'
    ];

    protected $appends = [
        'tgl_mulai_indo',
        'tgl_selesai_indo'
    ];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }

    public function getTglSelesaiIndoAttribute()
    {
        if($this->attributes['tgl_selesai'])
        {
            return Carbon::parse($this->attributes['tgl_selesai'])->translatedFormat('d F Y');
        }
        else{
            return 'Sekarang';
        }
        
    }
}
