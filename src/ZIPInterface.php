<?php

declare(strict_types=1);

namespace MiBo\ZIP;

use Stringable;

/**
 * Interface ZIPInterface
 *
 * @package MiBo\ZIP
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface ZIPInterface extends Stringable
{
    public function getValue(): string;

    public function getFormattedValue(): string;

    public function getCountryCode(): string;

    public function is(self $zip): bool;
}
