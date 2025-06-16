<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Support()
 * @method static Seller()
 */
final class GuardNames extends Enum
{
    const Support = 'support';
    const Seller = 'seller';
    const Admin = 'admin';
    const User = 'user';
}
