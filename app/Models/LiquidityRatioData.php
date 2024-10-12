<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidityRatioData extends Model
{
    use HasFactory;

    protected $table = 'liquidity_ratio_data';
    protected $fillable = [
        'company_id',
        'year',
        'quarter',
        'DAR',
        'DER',
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}