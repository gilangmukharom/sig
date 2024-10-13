<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $fillable = [
        'ticker',
        'name',
        'address',
        'market_cap',
        'price',
        'growth',
        'category',
        'description',
    ];

    public $timestamps = false;

    public function revenues()
    {
        return $this->hasMany(RevenueData::class);
    }

    public function financialPositions()
    {
        return $this->hasMany(FinancialPositionData::class);
    }

    public function dividends()
    {
        return $this->hasMany(DividendData::class);
    }

    public function profitabilityRatios()
    {
        return $this->hasMany(ProfitabilityRatioData::class);
    }

    public function relativeRatios()
    {
        return $this->hasMany(RelativeRatioData::class);
    }

    public function liquidityRatios()
    {
        return $this->hasMany(LiquidityRatioData::class);
    }
}