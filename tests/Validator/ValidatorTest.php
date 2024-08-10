<?php

declare(strict_types=1);

namespace MiBo\ZIP\Tests\Validator;

use MiBo\ZIP\Validator;
use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidatorTest
 *
 * @package MiBo\ZIP\Tests\Validator
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Validator::class)]
#[Small]
final class ValidatorTest extends TestCase
{
    #[DataProviderExternal(ValidationProvider::class, 'getData')]
    public function testIsValid(?bool $shouldBeValid, string $value, string $country): void
    {
        if ($shouldBeValid === null) {
            self::expectException(OutOfBoundsException::class);
        }

        self::assertSame($shouldBeValid, Validator::isValid($country, $value));
    }

    #[DataProviderExternal(FormatProvider::class, 'getData')]
    public function testFormatting(
        string $country,
        string $inputZip,
        string $expectedShortZip,
        string $expectedFormattedZip
    ): void
    {
        self::assertSame($expectedShortZip, Validator::getShortValue($country, $inputZip));
        self::assertSame($expectedFormattedZip, Validator::getFormattedValue($country, $inputZip));
    }
}
