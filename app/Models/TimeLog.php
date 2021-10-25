<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id', 'code_id', 'title', 'daytime', 'date', 'hours', 'confirmed', 'payable', 'worked'];
    public function project(){
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
