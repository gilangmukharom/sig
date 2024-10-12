<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueData extends Model
{
    use HasFactory;

    protected $table = 'revenue_data';
    protected $fillable = [
        'company_id',
        'year',
        'quarter',
        'revenue',
        'gross_profit',
        'net_profit',
    ];

    public $timestamps = false;

    // Relasi balik ke Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}