<?php

namespace App\Models\Promotion;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @package App\Models\Coupon
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
