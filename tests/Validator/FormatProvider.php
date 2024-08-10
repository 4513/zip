<?php

declare(strict_types=1);

namespace MiBo\ZIP\Tests\Validator;

/**
 * Class FormatProvider
 *
 * @package MiBo\ZIP\Tests\Validator
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class FormatProvider
{
    /**
     * @return array<array<string>>
     */
    public static function getData(): array
    {
        return [
            'SK #1' => [
                'SK',
                '08001',
                '08001',
                '080 01',
            ],
            'SK #2' => [
                'SK',
                '080 01',
                '08001',
                '080 01',
            ],
            'CZ #1' => [
                'CZ',
                '25601',
                '25601',
                '256 01',
            ],
            'AZ #1' => [
                'AZ',
                'AZ1000',
                'AZ1000',
                'AZ 1000',
            ],
            'AZ #2' => [
                'AZ',
                'AZ 1000',
                'AZ1000',
                'AZ 1000',
            ],
            'Unknown' => [
                'XX',
                '123456 ABC DEF -84',
                '123456 ABC DEF -84',
                '123456 ABC DEF -84',
            ],
            'CU #1' => [
                'CU',
                'CP12345',
                '12345',
                'CP12345',
            ],
            'CU #2' => [
                'CU',
                '12345',
                '12345',
                'CP12345',
            ],
            'HT #1' => [
                'HT',
                'HT1234',
                'HT1234',
                'HT 1234',
            ],
            'HT #2' => [
                'HT',
                'HT 1234',
                'HT1234',
                'HT 1234',
            ],
            'IR #1' => [
                'IR',
                '12345-12345',
                '1234512345',
                '12345-12345',
            ],
            'IR #2' => [
                'IR',
                '1234512345',
                '1234512345',
                '12345-12345',
            ],
            'LT #1' => [
                'LT',
                'LT-12345',
                '12345',
                'LT-12345',
            ],
            'LT #2' => [
                'LT',
                '12345',
                '12345',
                'LT-12345',
            ],
            'LU #1' => [
                'LU',
                'L-1234',
                '1234',
                'L-1234',
            ],
            'LU #2' => [
                'LU',
                '1234',
                '1234',
                'L-1234',
            ],
            'LV #1' => [
                'LV',
                'LV-1234',
                '1234',
                'LV-1234',
            ],
            'LV #2' => [
                'LV',
                '1234',
                '1234',
                'LV-1234',
            ],
            'MD #1' => [
                'MD',
                'MD-1234',
                '1234',
                'MD-1234',
            ],
            'MD #2' => [
                'MD',
                '1234',
                '1234',
                'MD-1234',
            ],
            'MD #3' => [
                'MD',
                'MD1234',
                '1234',
                'MD-1234',
            ],
            'MT #1' => [
                'MT',
                'ABC 1234',
                'ABC1234',
                'ABC 1234',
            ],
            'MT #2' => [
                'MT',
                'ABC1234',
                'ABC1234',
                'ABC 1234',
            ],
            'MT #3' => [
                'MT',
                'AB 12',
                'AB12',
                'AB 12',
            ],
            'MT #4' => [
                'MT',
                'AB12',
                'AB12',
                'AB 12',
            ],
            'MT #5' => [
                'MT',
                'ABC1234',
                'ABC1234',
                'ABC 1234',
            ],
            'MT #6' => [
                'MT',
                'ABC 1234',
                'ABC1234',
                'ABC 1234',
            ],
            'MT #7' => [
                'MT',
                'ABC12',
                'ABC12',
                'ABC 12',
            ],
            'MT #8' => [
                'MT',
                'ABC 12',
                'ABC12',
                'ABC 12',
            ],
            'NL #1' => [
                'NL',
                '1012 AB',
                '1012AB',
                '1012 AB',
            ],
            'NL #2' => [
                'NL',
                '1012AB',
                '1012AB',
                '1012 AB',
            ],
            'TW #1' => [
                'TW',
                '123-456',
                '123456',
                '123-456',
            ],
            'TW #2' => [
                'TW',
                '123456',
                '123456',
                '123-456',
            ],
            'TW #3' => [
                'TW',
                '123',
                '123',
                '123',
            ],
            'TW #4' => [
                'TW',
                '123-45',
                '123-45',
                '123-45',
            ],
        ];
    }
}
