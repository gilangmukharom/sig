<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPositionData extends Model
{
    use HasFactory;

    protected $table = 'financial_position_data';

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
