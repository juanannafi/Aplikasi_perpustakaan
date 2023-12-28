<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'mst_buku';
    protected $guarded = ['id'];

    public function penerbit() {
        return $this->belongsTo(Penerbit::class);
    }

    
}