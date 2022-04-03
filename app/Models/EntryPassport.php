<?php

namespace App\Models;

use App\Models\Mofa;
use App\Models\Flight;
use App\Models\ManPower;
use App\Models\FinalMedical;
use App\Models\PoliceClearance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntryPassport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function test_medicals() {
        return $this->hasOne(TestMedical::class);
    }

    public function final_medicals() {
        return $this->hasOne(FinalMedical::class,  'test_medical_id', 'id');
    }

    public function police_clearances() {
        return $this->hasOne(PoliceClearance::class, 'final_medical_id', 'id');
    }

    public function mofas() {
        return $this->hasOne(Mofa::class, 'police_clearance_id', 'id');
    }

    public function visas() {
        return $this->hasOne(Visa::class, 'mofa_id', 'id');
    }

    public function tran_certis() {
        return $this->hasOne(TranCerti::class, 'visa_id', 'id');
    }

    public function man_powers() {
        return $this->hasOne(ManPower::class, 'tran_id', 'id');
    }

    public function flights() {
        return $this->hasOne(Flight::class, 'man_id', 'id');
    }

}
