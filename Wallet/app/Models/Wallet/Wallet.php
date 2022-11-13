<?php

namespace App\Models\Wallet;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @package App\Models\Wallet
 *
 * @property string $mobile
 *
 * @property int $balance
 */
class Wallet extends Model
{
    use HasFactory;

    protected $connection = 'mysql_wallet';

    protected $fillable = [
        'mobile',
        'balance',
    ];


    protected $hidden = [
    ];

    protected $casts = [
    ];

    // ************************************* Relations ****************************
    public function walletTransaction()
    {
        return $this->hasMany(WalletTransaction::class);
    }
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
}
