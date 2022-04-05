<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function agents(){
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
}
