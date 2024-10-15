<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        3:33 AM
 */

namespace App\Entities\Cast;

use CodeIgniter\Entity\Cast\BaseCast;

/**
 * Class CastDecimal.
 *
 * Cast entity's property to decimal type.
 */
class Decimal extends BaseCast
{
    /**
     * {@inheritDoc}
     */
    public static function get(
        $value,
        array $params = []
    ): array|bool|float|int|object|string|null {
        if (! is_float($value)) {
            return false;
        }

        return number_format($value, 2, '.', '');
    }

    /**
     * {@inheritDoc}
     */
    public static function set(
        $value,
        array $params = []
    ): array|bool|float|int|object|string|null {
        if (! is_float($value)) {
            return false;
        }

        return number_format($value, 2, '.', '');
    }
}
