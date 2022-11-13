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
 * @property string $code
 *
 * @property integer $coupon_group_id
 * @property CouponGroup $couponGroup
 *
 * @property int $used_count
 */
class Coupon extends Model
{
    use HasFactory;

    const STATUS_ACTIVE   = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $connection = '';

    protected $fillable = [
        'title',
        'prefix',
        'length',
        'unique_length',
        'max_count',
        'used_count',
        'start_at',
        'end_at',
        'effects',
        'status'
    ];


    protected $hidden = [
    ];

    protected $casts = [
        'effects' => 'array'
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
