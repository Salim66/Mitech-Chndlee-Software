<?php

namespace App\Models;

use App\Models\EntryPassport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TranCerti extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function entry(){
        return $this->belongsTo(EntryPassport::class, 'visa_id');
    }
}
