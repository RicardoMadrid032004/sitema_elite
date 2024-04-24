<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'text1',
        'text2',
        'text3',
        'text4',
        'image1',
        'image2',
        'image3',
        'image4',
        'eslider1',
        'eslider2',
        'eslider3',
        'eslider4',
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
