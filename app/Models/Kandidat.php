<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    public $fillable = ['kandidat_uuid','no_kandidat','nama_kandidat'];
    protected $table = 'kandidat';
    protected $casts = [
        'no_kandidat' => 'integer',
        'kandidat_uuid' => 'string'
    ];
}
