<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'artists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'pin',
        'pin_reset',
        'enabled',
        'six_month_royalties',
        'loan_limit',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function artistLoans()
    {
        return $this->hasMany(Loan::class, 'artist_id', 'id');
    }

    public function artistPayments()
    {
        return $this->hasMany(Payment::class, 'artist_id', 'id');
    }
    
}
