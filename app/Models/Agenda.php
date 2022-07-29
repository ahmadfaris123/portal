<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    protected $fillable = [
        'nama_agenda','tempat_agenda','deskripsi_agenda', 'waktu_agenda', 'tgl_publish'
    ];
}
