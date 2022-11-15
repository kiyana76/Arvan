<?php

namespace App\Models\Promotions;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use PHPUnit\Util\Json;

/**
 *
 * @package App\Models\Promotion
 *
 * @property integer $id
 * @property string $code
 *
 * @property integer $coupon_group_id
 * @property CouponGroup $CouponGroup
 *
 * @property string $mobile
 */
class Coupon extends Model
{
    use HasFactory;

    protected $connection = 'mysql_promotion';

    protected $fillable = [
        'code',
        'mobile'
    ];


    protected $hidden = [
    ];

    protected $casts = [
    ];

    // ************************************* Relations ****************************
    public function CouponGroup()
    {
        return $this->belongsTo(CouponGroup::class);
    }
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
}
