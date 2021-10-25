<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCode extends Model
{
    use HasFactory;

    public function code(){
        return $this->hasOne(Codes::class, 'id', 'code_id');
    }
}
