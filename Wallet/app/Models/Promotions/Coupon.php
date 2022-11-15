<?php

namespace App\Models\Promotions;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @package App\Models\Promotions\Coupon
 *
 * @property string $code
 *
 * @property integer $coupon_group_id
 *
 * @property integer $used_count
 */
class Coupon extends Model
{
    use HasFactory;

    protected $connection = 'mysql_promotion';

    protected $fillable = [
        'coupon_group_id',
        'used_count',
        'code'
    ];


    protected $hidden = [
    ];

    protected $casts = [
    ];
}
