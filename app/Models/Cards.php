<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;
    protected $table = 'populations';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
