<?php

namespace App\Models\Wallet;


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
 *
 * @property string $agentable_type
 * @property int    $agentable_id
 *
 * @property WalletTransaction $walletTransaction
 */
class WalletTransaction extends Model
{
    use HasFactory;

    protected $connection = 'mysql_wallet';

    const OPERATION_INCREASE = 'increase';
    const OPERATION_DECREASE = 'decrease';
    const OPERATION          = [
        self::OPERATION_INCREASE,
        self::OPERATION_DECREASE
    ];


    protected $fillable = [
        'amount',
        'operation',
        'agentable_type',
        'agentable_id'
    ];


    protected $hidden = [
    ];


    protected $casts = [
    ];

    // ************************************* Relations ****************************
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
}
