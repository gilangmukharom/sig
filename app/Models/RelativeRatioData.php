<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativeRatioData extends Model
{
    use HasFactory;

    protected $table = 'relative_ratio_data';

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
