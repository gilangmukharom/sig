<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitabilityRatioData extends Model
{
    use HasFactory;

    protected $table = 'profitability_ratio_data';

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
