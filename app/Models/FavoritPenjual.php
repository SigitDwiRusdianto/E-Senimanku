<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritPenjual extends Model
{
    use HasFactory;
    protected $table = 'favorit_penjual';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'penjual_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }
}
