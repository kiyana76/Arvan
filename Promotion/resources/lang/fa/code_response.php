<?php


use App\Http\Controllers\Controller;

return [
    Controller::SUCCESS_APPLY            => 'کد با موفقیت اعمال شد',
    Controller::SUCCESS                  => 'عملیات با موفقیت اعمال شد',
    Controller::FAILED                   => 'عملیات با خطا مواجه شد.',
    Controller::CODE_NOT_FOUND           => 'کد موردنظر یافت نشد.',
    Controller::ERROR_COUPON_INACTIVE    => 'کد مورد نظر فعال نمی‌باشد.',
    Controller::ERROR_COUPON_NOT_STARTED => 'تاریخ شروع استفاده از کد تخفیف مورد نظر هنوز آغاز نشده است',
    Controller::ERROR_COUPON_NOT_ENDED   => 'تاریخ استفاده از کد تخفیف مورد نظر به پایان رسیده است',
    Controller::ERROR_COUPON_MAX_COUNT   => 'ظرفیت استفاده از کوپون به پایان رسیده است.',
    Controller::ERROR_DEPOSIT_FAILED     => 'واریز به کیف پول انجام نشد.',
    Controller::ERROR_APPLY_FAILED       => 'کد مورد نظر اعمال نگردید.',
];
