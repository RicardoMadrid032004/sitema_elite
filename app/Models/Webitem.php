<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'text',
        'image',
        'eslider',
        'webcategoria_id',
    ];
    public function webcategoria()
    {
        return $this->belongsTo(Webcategoria::class);
    }
    public function Webitem()
    {
        return $this->belongsTo(Webitem::class);
    }
}
