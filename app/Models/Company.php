<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    public $timestamps = false;

    // Relasi ke RevenueData
    public function revenues()
    {
        return $this->hasMany(RevenueData::class);
    }

    // Relasi ke FinancialPositionData
    public function financialPositions()
    {
        return $this->hasMany(FinancialPositionData::class);
    }

    // Relasi ke DividendData
    public function dividends()
    {
        return $this->hasMany(DividendData::class);
    }

    // Relasi ke ProfitabilityRatioData
    public function profitabilityRatios()
    {
        return $this->hasMany(ProfitabilityRatioData::class);
    }

    // Relasi ke RelativeRatioData
    public function relativeRatios()
    {
        return $this->hasMany(RelativeRatioData::class);
    }

    // Relasi ke LiquidityRatioData
    public function liquidityRatios()
    {
        return $this->hasMany(LiquidityRatioData::class);
    }
}
