<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    public $fillable = ['partai_uuid', 'no_partai', 'nama_partai', 'deskripsi'];
    protected $table = 'partai';
    protected $casts = [
        'no_partai' => 'integer',
        'partai_uuid' => 'string'
    ];
}
