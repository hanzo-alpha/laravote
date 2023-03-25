<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    public $fillable = ['vote_uuid', 'partai', 'kandidat', 'jumlah_suara','total_suara','persentase_suara','data'];
    protected $table = 'vote';
    protected $casts = [
        'data' => 'json',
        'jumlah_suara' => 'double',
        'total_suara' => 'double',
        'persentase_suara' => 'double',
    ];

    public function partai(): BelongsTo
    {
        return $this->belongsTo('partai','id');
    }

    public function kandidat(): BelongsTo
    {
        return $this->belongsTo('kandidat','id');
    }
}
