<?php

namespace App\Containers\EMagazine\Enums;

use App\Containers\BaseContainer\Enums\BaseEnum;

class EnumEmagzine extends BaseEnum
{
    const PERPAGEE = 10;
    const IS_HOT = 1;
    const statusText = [
        self::ACTIVE => 'Hiển thị',
        self::DE_ACTIVE => 'Ẩn'
    ];
    const FRONTEND_PERPAGE = 15;
    const FRONTEND_PER_LINE = 3;
}
