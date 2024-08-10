<?php

declare(strict_types=1);

namespace MiBo\ZIP\Tests;

use MiBo\ZIP\InvalidZIPException;
use MiBo\ZIP\ZIP;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ZIPTest
 *
 * @package MiBo\ZIP\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(ZIP::class)]
#[Small]
final class ZIPTest extends TestCase
{
    #[DataProvider('getClassData')]
    public function testZIPClass(
        string $countryCode,
        string $value,
        string $expectedShortValue,
        string $expectedFormattedValue,
        bool $expectedIsValid = true
    ): void
    {
        if (!$expectedIsValid) {
            self::expectException(InvalidZIPException::class);
        }

        $class = new ZIP($countryCode, $value);

        self::assertSame($countryCode, $class->getCountryCode());
        self::assertSame($value, $class->getValue());
        self::assertSame($expectedShortValue, $class->getValue());
        self::assertSame($expectedFormattedValue, $class->getFormattedValue());
        self::assertSame($expectedFormattedValue, (string) $class);
    }

    #[DataProvider('getEqualityData')]
    public function testEquality(bool $shouldBeSame, ZIP $first, ZIP $second): void
    {
        self::assertSame($shouldBeSame, $first->is($second));
    }

    /**
     * @return array<array<string|bool>>
     */
    public static function getClassData(): array
    {
        return [
            [
                'SK',
                '08001',
                '08001',
                '080 01',
            ],
            [
                'SK',
                '000',
                '',
                '',
                false,
            ],
        ];
    }

    /**
     * @return array<array<bool|\MiBo\ZIP\ZIP>>
     */
    public static function getEqualityData(): array
    {
        return [
            [
                true,
                new ZIP('SK', '08801'),
                new ZIP('SK', '08801'),
            ],
            [
                false,
                new ZIP('SK', '12345'),
                new ZIP('CZ', '12345'),
            ],
            [
                false,
                new ZIP('SK', '12345'),
                new ZIP('SK', '54321'),
            ],
        ];
    }
}
