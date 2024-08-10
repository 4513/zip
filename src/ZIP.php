<?php

declare(strict_types=1);

namespace MiBo\ZIP;

use MiBo\Countries\ISO\Country;
use function is_string;

/**
 * Class ZIP
 *
 * @package MiBo\ZIP
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class ZIP implements ZIPInterface
{
    private string $countryCode;

    private string $formattedValue;

    private string $shortValue;

    /**
     * @param non-empty-string|\MiBo\Countries\ISO\Country $country
     * @param non-empty-string $value
     */
    public function __construct(string|Country $country, string $value)
    {
        $this->countryCode = is_string($country) ? $country : $country->getAlpha2();

        $isValid = Validator::isValid($this->countryCode, $value);

        if ($isValid === false) {
            throw new InvalidZIPException(
                'Invalid ZIP code \'' . $value . '\' for country \'' . $this->countryCode . '\'.'
            );
        }

        $this->shortValue     = Validator::getShortValue($this->countryCode, $value);
        $this->formattedValue = Validator::getFormattedValue($this->countryCode, $value);
    }

    public function getValue(): string
    {
        return $this->shortValue;
    }

    public function getFormattedValue(): string
    {
        return $this->formattedValue;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function is(ZIPInterface $zip): bool
    {
        return $this->getFormattedValue() === $zip->getFormattedValue()
            && $this->getCountryCode() === $zip->getCountryCode();
    }

    public function __toString(): string
    {
        return $this->getFormattedValue();
    }
}
