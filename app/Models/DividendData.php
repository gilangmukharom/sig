<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DividendData extends Model
{
    use HasFactory;

    protected $table = 'dividend_data';
    protected $fillable = [
        'company_id',
        'year',
        'quarter',
        'dividend_per_sheet',
        'yield',
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}