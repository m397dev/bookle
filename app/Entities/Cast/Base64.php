<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        3:32 AM
 */

namespace App\Entities\Cast;

use CodeIgniter\Entity\Cast\BaseCast;

/**
 * Class CastBase64.
 *
 * Cast entity's property to base64 type.
 */
class Base64 extends BaseCast
{
    /**
     * {@inheritDoc}
     */
    public static function get(
        $value,
        array $params = []
    ): array|bool|float|int|object|string|null {
        return base64_decode($value, true);
    }

    /**
     * {@inheritDoc}
     */
    public static function set(
        $value,
        array $params = []
    ): array|bool|float|int|object|string|null {
        return base64_encode($value);
    }
}
