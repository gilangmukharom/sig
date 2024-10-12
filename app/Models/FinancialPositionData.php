<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPositionData extends Model
{
    use HasFactory;

    protected $table = 'financial_position_data';
    protected $fillable = [
        'company_id',
        'year',
        'quarter',
        'asset',
        'liability',
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}