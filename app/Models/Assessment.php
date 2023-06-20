<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['employee', 'criteria'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
