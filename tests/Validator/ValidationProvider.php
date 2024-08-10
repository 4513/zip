<?php

declare(strict_types=1);

namespace MiBo\ZIP\Tests\Validator;

/**
 * Class ValidationProvider
 *
 * @package MiBo\ZIP\Tests\Validator
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class ValidationProvider
{
    /**
     * @return array<array<string>>
     */
    public static function getData(): array
    {
        return [
            'SK Valid #1' => [
                true,
                '08001',
                'SK',
            ],
            'SK Valid #2' => [
                true,
                '080 01',
                'SK',
            ],
            'SK Valid #3' => [
                true,
                '00000',
                'SK',
            ],
            'SK Invalid #1' => [
                false,
                '0800',
                'SK',
            ],
            'SK Invalid #2' => [
                false,
                '0800 1',
                'SK',
            ],
            'SK Invalid #3' => [
                false,
                '0800-1',
                'SK',
            ],
            'SK Invalid #4' => [
                false,
                '080000',
                'SK',
            ],
            'SK Invalid #5' => [
                false,
                '',
                'SK',
            ],
            'Unknown country' => [
                null,
                '08001',
                'XX',
            ],
            'Empty string' => [
                false,
                '',
                'SK',
            ],
        ];
    }
}
