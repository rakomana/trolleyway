<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static PrimaryAdmin()
 * @method static SuperAdmin()
 */
final class Role extends Enum
{
    const PrimaryAdmin = 'Primary Admin';
    const SuperAdmin = 'Super Admin';
}
