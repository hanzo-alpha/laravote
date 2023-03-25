<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPartai extends Model
{
    public $fillable = ['alamat', 'no_telp', 'website', 'email'];
    protected $table = 'profil_partai';
    protected $casts = [

    ];
}
