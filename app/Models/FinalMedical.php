<?php

namespace App\Models;

use App\Models\TestMedical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalMedical extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function entry(){
        return $this->belongsTo(EntryPassport::class, 'test_medical_id');
    }

}
