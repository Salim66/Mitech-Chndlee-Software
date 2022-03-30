<?php

namespace App\Models;

use App\Models\EntryPassport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function entry(){
        return $this->belongsTo(EntryPassport::class, 'man_id');
    }
}
