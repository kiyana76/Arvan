<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class WalletTransaction
 *
 * @package App\Models\WalletTransaction
 *
 * @property integer $amount
 *
 * @property string $operation
 */
class WalletTransaction extends Model
{
    use HasFactory;

    const OPERATION_INCREASE = 'increase';
    const OPERATION_DECREASE = 'decrease';
    const OPERATION          = [
        self::OPERATION_INCREASE,
        self::OPERATION_DECREASE
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'operation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
