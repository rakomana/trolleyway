<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Approved()
 * @method static Suspend()
 */
final class BlockStatus extends Enum
{
    const Approved = 'Approved';
    const Suspend = 'Suspend';
}
