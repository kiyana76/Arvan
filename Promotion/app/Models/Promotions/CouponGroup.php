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
 * @property string $title
 * @property string $prefix
 * @property integer $length
 * @property integer $unique_length
 * @property integer $max_count
 * @property integer $used_count
 * @property Date $start_at
 * @property Date $end_at
 *
 * @property Json $effects
 *
 * @property string $status
 *
 * @property int $balance
 */
class CouponGroup extends Model
{
    use HasFactory;

    const STATUS_ACTIVE   = 'active';
    const STATUS_INACTIVE = 'inactive';

    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE
    ];

    const KIND_PUBLIC  = 'public';
    const KIND_PRIVATE = 'private';

    const KINDS = [
        self::KIND_PRIVATE,
        self::KIND_PUBLIC
    ];

    const EFFECT_INCREASE_CREDIT = 'increase_credit';
    const EFFECTS = [
        self::EFFECT_INCREASE_CREDIT
    ];

    protected $connection = 'mysql_promotion';

    protected $fillable = [
        'title',
        'kind',
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
    public function Coupon()
    {
        return $this->hasMany(Coupon::class);
    }
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
    // ************************************* Attributes ***************************
    // ************************************* Methods ******************************
}
