<?php

declare(strict_types=1);

namespace MiBo\ZIP;

use OutOfBoundsException;
use function in_array;

/**
 * Class Validator
 *
 * @package MiBo\ZIP
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Validator
{
    // @phpcs:disable SlevomatCodingStandard.Files.LineLength.LineTooLong
    /** @var array<non-empty-string, non-empty-string> */
    private static array $rules = [
        'AD' => '/^AD\d{3}$/',
        'AE' => '/^.{1,255}$/',
        'AF' => '/^\d{4}$/',
        'AG' => '/^.{1,255}$/',
        'AI' => '/^AI-2640$/',
        'AL' => '/^\d{4}$/',
        'AM' => '/^(\d{4}$|^\d{6})$/',
        'AO' => '/^.{1,255}$/',
        'AQ' => '/^7151$/',
        'AR' => '/^([A-Z]\d{4}[A-Z]{3})$|^([A-Z]\d{4})$/',
        'AS' => '/^967\d{2}(-\d{4})?$/',
        'AT' => '/^\d{4}$/',
        'AU' => '/^\d{4}$/',
        'AW' => '/^.{1,255}$/',
        'AX' => '/^22\d{3}$/',
        'AZ' => '/^(AZ)(\d{4})$|^(AZ )(\d{4})$/',
        'BA' => '/^\d{5}$/',
        'BB' => '/^BB\d{5}$/',
        'BD' => '/^\d{4}$/',
        'BE' => '/^\d{4}$/',
        'BF' => '/^[1-9]\d{4}$/',
        'BG' => '/^\d{4}$/',
        'BH' => '/^\d{3}\d?$/',
        'BI' => '/^.{1,255}$/',
        'BJ' => '/^.{1,255}$/',
        'BL' => '/^(9709\d{1})$|^97133$/',
        'BM' => '/^[A-Z]{2} \d{2}$/',
        'BN' => '/^[A-Z]{2}\d{4}$/',
        'BO' => '/^.{1,255}$/',
        'BQ' => '/^.{1,255}$/',
        'BR' => '/^[0-9]{5}-[0-9]{3}$/',
        'BS' => '/^.{1,255}$/',
        'BT' => '/^\d{5}$/',
        'BV' => '/^.{1,255}$/',
        'BW' => '/^.{1,255}$/',
        'BY' => '/^\d{6}$/',
        'BZ' => '/^.{1,255}$/',
        'CA' => '/^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$/',
        'CC' => '/^(6799)$/',
        'CD' => '/^.{1,255}$/',
        'CF' => '/^.{1,255}$/',
        'CG' => '/^.{1,255}$/',
        'CH' => '/^[1-9]\d{3}$/',
        'CI' => '/^.{1,255}$/',
        'CK' => '/^.{1,255}$/',
        'CL' => '/^\d{7}$/',
        'CM' => '/^.{1,255}$/',
        'CN' => '/^\d{6}$/',
        'CO' => '/^\d{6}$/',
        'CR' => '/^\d{5}$/',
        'CU' => '/^(CP)?\d{5}$/',
        'CV' => '/^\d{4}$/',
        'CW' => '/^.{1,255}$/',
        'CX' => '/^(6798)$/',
        'CY' => '/^[1-9]\d{3}$/',
        'CZ' => '/^[1-7][0-9]{2} [0-9]{2}$|^[1-7][0-9]{4}$/',
        'DE' => '/^\d{5}$/',
        'DJ' => '/^.{1,255}$/',
        'DK' => '/^\d{4}$/',
        'DM' => '/^.{1,255}$/',
        'DO' => '/^\d{5}$/',
        'DZ' => '/^\d{5}$/',
        'EC' => '/^\d{6}$/',
        'EE' => '/^\d{5}$/',
        'EG' => '/^\d{5}$/',
        'EH' => '/^7\d{4}$/',
        'ER' => '/^.{1,255}$/',
        'ES' => '/^\d{5}$/',
        'ET' => '/^\d{4}$/',
        'FI' => '/^\d{5}$/',
        'FJ' => '/^.{1,255}$/',
        'FK' => '/^(FIQQ 1ZZ)$/',
        'FM' => '/^9694\d{1}(-\d{4})?$/',
        'FO' => '/^\d{3}$/',
        'FR' => '/^\d{5}$/',
        'GA' => '/^.{1,255}$/',
        'GB' => '/^([G][I][R] 0[A]{2})$|^((([A-Z][0-9]{1,2})$|^(([A-Z][A-HJ-Y][0-9]{1,2})$|^(([A-Z][0-9][A-Z])$|^([A-Z][A-HJ-Y][0-9]?[A-Z])))) [0-9][A-Z]{2})$/',
        'GD' => '/^.{1,255}$/',
        'GE' => '/^\d{4}$/',
        'GF' => '/^973\d{2}$/',
        'GG' => '/^(GY)([0-9][0-9A-HJKPS-UW]?$|^[A-HK-Y][0-9][0-9ABEHMNPRV-Y]?) [0-9][ABD-HJLNP-UW-Z]{2}$/',
        'GH' => '/^.{1,255}$/',
        'GI' => '/^(GX11 1AA)$/',
        'GL' => '/^39\d{2}$/',
        'GM' => '/^.{1,255}$/',
        'GN' => '/^\d{3}$/',
        'GP' => '/^97[0-1]\d{2}$/',
        'GQ' => '/^.{1,255}$/',
        'GR' => '/^(\d{3}) \d{2}$|^\d{5}$/',
        'GS' => '/^(SIQQ 1ZZ)$/',
        'GT' => '/^\d{5}$/',
        'GU' => '/^((969)[1-3][0-2])(-\d{4})?$/',
        'GW' => '/^\d{4}$/',
        'GY' => '/^.{1,255}$/',
        'HK' => '/^(999077)$/',
        'HM' => '/^(7151)$/',
        'HN' => '/^\d{5}$/',
        'HR' => '/^[1-5]\d{4}$/',
        'HT' => '/^(HT)(\d{4})$|^(HT) (\d{4})$/',
        'HU' => '/^[1-9]\d{3}$/',
        'ID' => '/^[1-9]\d{4}$/',
        'IE' => '/^.{1,255}$/',
        'IL' => '/^\d{7}$/',
        'IM' => '/^(IM)([0-9][0-9A-HJKPS-UW]?$|^[A-HK-Y][0-9][0-9ABEHMNPRV-Y]?) [0-9][ABD-HJLNP-UW-Z]{2}$/',
        'IN' => '/^[1-9]\d{5}$/',
        'IO' => '/^(BB9D 1ZZ)$/',
        'IQ' => '/^\d{5}$/',
        'IR' => '/^\d{5}[\-]?\d{5}$/',
        'IS' => '/^[1-9]\d{2}$/',
        'IT' => '/^\d{5}$/',
        'JE' => '/^JE[0-9]{1}[\s]([\d][A-Z]{2})$/',
        'JM' => '/^(JM)[A-Z]{3}\d{2}$/',
        'JO' => '/^\d{5}$/',
        'JP' => '/^(\d{3}-\d{4})$/',
        'KE' => '/^\d{5}$/',
        'KG' => '/^\d{6}$/',
        'KH' => '/^\d{5,6}$/',
        'KI' => '/^KI\d{4}$/',
        'KM' => '/^.{1,255}$/',
        'KN' => '/^KN\d{4}(\-\d{4})?$/',
        'KP' => '/^.{1,255}$/',
        'KR' => '/^\d{5}$/',
        'KW' => '/^\d{5}$/',
        'KY' => '/^[K][Y][0-9]{1}[-]([0-9]){4}$/',
        'KZ' => '/^([A-Z]\d{2}[A-Z]\d[A-Z]\d)$|^(\d{6})$/',
        'LA' => '/^\d{5}$/',
        'LB' => '/^\d{4}( \d{4})?$/',
        'LC' => '/^LC\d{2}  \d{3}$/',
        'LI' => '/^\d{4}$/',
        'LK' => '/^\d{5}$/',
        'LR' => '/^\d{4}$/',
        'LS' => '/^\d{3}$/',
        'LT' => '/^((LT)[\-])?(\d{5})$/',
        'LU' => '/^((L)[\-])?(\d{4})$/',
        'LV' => '/^((LV)[\-])?(\d{4})$/',
        'LY' => '/^.{1,255}$/',
        'MA' => '/^[1-9]\d{4}$/',
        'MC' => '/^980\d{2}$/',
        'MD' => '/^(MD[\-]?)?(\d{4})$/',
        'ME' => '/^\d{5}$/',
        'MF' => '/^97[0-1]\d{2}$/',
        'MG' => '/^\d{3}$/',
        'MH' => '/^((969)[6-7][0-9])(-\d{4})?$/',
        'MK' => '/^\d{4}$/',
        'ML' => '/^.{1,255}$/',
        'MM' => '/^\d{5}$/',
        'MN' => '/^\d{5}$/',
        'MO' => '/^.{1,255}$/',
        'MP' => '/^9695\d{1}(-\d{4})?$/',
        'MQ' => '/^972\d{2}$/',
        'MR' => '/^.{1,255}$/',
        'MS' => '/^MSR\d{4}$/',
        'MT' => '/^[A-Z]{3} [0-9]{4}$|^[A-Z]{2}[0-9]{2}$|^[A-Z]{2} [0-9]{2}$|^[A-Z]{3}[0-9]{4}$|^[A-Z]{3}[0-9]{2}$|^[A-Z]{3} [0-9]{2}$/',
        'MU' => '/^([0-9A-R]\d{4})$/',
        'MV' => '/^\d{5}$/',
        'MW' => '/^\d{6}$/',
        'MX' => '/^\d{5}$/',
        'MY' => '/^\d{5}$/',
        'MZ' => '/^\d{4}$/',
        'NA' => '/^\d{5}$/',
        'NC' => '/^988\d{2}$/',
        'NE' => '/^\d{4}$/',
        'NF' => '/^(2899)$/',
        'NG' => '/^[1-9]\d{5}$/',
        'NI' => '/^\d{5}$/',
        'NL' => '/^[1-9]\d{3} [A-Z]{2}$|^[1-9]\d{3}[A-Z]{2}$/',
        'NO' => '/^\d{4}$/',
        'NP' => '/^\d{5}$/',
        'NR' => '/^(NRU68)$/',
        'NU' => '/^(9974)$/',
        'NZ' => '/^\d{4}$/',
        'OM' => '/^\d{3}$/',
        'PA' => '/^\d{4}$/',
        'PE' => '/^\d{5}$/',
        'PF' => '/^((987)\d{2})$/',
        'PG' => '/^\d{3}$/',
        'PH' => '/^\d{4}$/',
        'PK' => '/^[1-9]\d{4}$/',
        'PL' => '/^[0-9]{2}[-]([0-9]){3}$/',
        'PM' => '/^975\d{2}$/',
        'PN' => '/^(PCR9 1ZZ)$/',
        'PR' => '/^00\d{3}(-\d{4})?$/',
        'PS' => '/^(P[1-9]\d{6})$|^(\d{3}-\d{3})$/',
        'PT' => '/^[1-9]\d{3}((-)\d{3})$/',
        'PW' => '/^(96939|96940)$/',
        'PY' => '/^\d{4}$/',
        'QA' => '/^.{1,255}$/',
        'RE' => '/^(974|977|978)\d{2}$/',
        'RO' => '/^\d{6}$/',
        'RS' => '/^\d{5,6}$/',
        'RU' => '/^\d{6}$/',
        'RW' => '/^.{1,255}$/',
        'SA' => '/^[1-8]\d{4}([\-]\d{4})?$/',
        'SB' => '/^.{1,255}$/',
        'SC' => '/^.{1,255}$/',
        'SD' => '/^\d{5}$/',
        'SE' => '/^[1-9]\d{2} \d{2}$/',
        'SG' => '/^\d{6}$/',
        'SH' => '/^(ASCN 1ZZ|TDCU 1ZZ|STHL 1ZZ)$/',
        'SI' => '/^[1-9]\d{3}$/',
        'SJ' => '/^8099$|^(917[0-1])$/',
        'SK' => '/^(\d{3} \d{2})$|^\d{5}$/',
        'SL' => '/^.{1,255}$/',
        'SM' => '/^(4789\d)$/',
        'SN' => '/^[1-8]\d{4}$/',
        'SO' => '/^.{1,255}$/',
        'SR' => '/^.{1,255}$/',
        'SS' => '/^\d{5}$/',
        'ST' => '/^.{1,255}$/',
        'SV' => '/^\d{4}$/',
        'SX' => '/^.{1,255}$/',
        'SY' => '/^.{1,255}$/',
        'SZ' => '/^([A-Z]\d{3})$/',
        'TC' => '/^(TKCA 1ZZ)$/',
        'TD' => '/^.{1,255}$/',
        'TF' => '/^.{1,255}$/',
        'TG' => '/^.{1,255}$/',
        'TH' => '/^\d{5}$/',
        'TJ' => '/^7\d{5}$/',
        'TK' => '/^.{1,255}$/',
        'TL' => '/^.{1,255}$/',
        'TM' => '/^7\d{5}$/',
        'TN' => '/^\d{4}$/',
        'TO' => '/^.{1,255}$/',
        'TR' => '/^\d{5}$/',
        'TT' => '/^\d{6}$/',
        'TV' => '/^.{1,255}$/',
        'TW' => '/^(\d{3}\-\d{3})$|^(\d{3}[-]\d{2})$|^(\d{6})$|^(\d{3})$/',
        'TZ' => '/^\d{5}$/',
        'UA' => '/^\d{5}$/',
        'UG' => '/^.{1,255}$/',
        'UM' => '/^.{1,255}$/',
        'US' => '/^\d{5}(-\d{4})?$/',
        'UY' => '/^[1-9]\d{4}$/',
        'UZ' => '/^\d{6}$/',
        'VA' => '/^(00120)$/',
        'VC' => '/^(VC)(\d{4})$/',
        'VE' => '/^[1-8]\d{3}$/',
        'VG' => '/^(VG11)[0-6][0]$/',
        'VI' => '/^008\d{2}(-\d{4})?$/',
        'VN' => '/^\d{6}$/',
        'VU' => '/^.{1,255}$/',
        'WF' => '/^(986)\d{2}$/',
        'YE' => '/^.{1,255}$/',
        'YT' => '/^(976|985)\d{2}$/',
        'ZA' => '/^\d{4}$/',
        'ZM' => '/^\d{5}$/',
        'ZW' => '/^.{1,255}$/',
    ];

    /** @var array<non-empty-string> */
    private static array $short = [
        'AZ',
        'CU',
        'CZ',
        'GR',
        'HT',
        'IR',
        'LT',
        'LU',
        'LV',
        'MD',
        'MT',
        'NL',
        'SK',
        'TW',
    ];

    /**
     * @param non-empty-string $countryAlpha2
     * @param string $zip
     *
     * @return bool
     */
    public static function isValid(string $countryAlpha2, string $zip): bool
    {
        if ($zip === '') {
            return false;
        }

        if (!key_exists($countryAlpha2, self::$rules)) {
            throw new OutOfBoundsException('Country not supported.');
        }

        return preg_match(self::$rules[$countryAlpha2], $zip) === 1;
    }

    public static function getShortValue(string $countryAlpha2, string $zip): string
    {
        if (!in_array($countryAlpha2, self::$short, true)) {
            return $zip;
        }

        if ($countryAlpha2 === 'TW' && strlen($zip) === 6) {
            return $zip;
        }

        return match ($countryAlpha2) {
            'AZ', 'CZ', 'GR', 'HT', 'MT', 'NL', 'SK' => str_replace(' ', '', $zip),
            'CU'                                     => str_replace('CP', '', $zip),
            'IR', 'TW'                               => str_replace('-', '', $zip),
            'LT'                                     => str_replace('LT-', '', $zip),
            'LU'                                     => str_replace('L-', '', $zip),
            'LV'                                     => str_replace('LV-', '', $zip),
            'MD'                                     => str_replace('MD', '', str_replace('MD-', '', $zip)),
            default                                  => $zip,
        };
    }

    // @phpcs:ignore SlevomatCodingStandard.Complexity.Cognitive.ComplexityTooHigh
    public static function getFormattedValue(string $countryAlpha2, string $zip): string
    {
        if (!in_array($countryAlpha2, self::$short, true)) {
            return $zip;
        }

        $zip = self::getShortValue($countryAlpha2, $zip);

        if ($countryAlpha2 === 'AZ') {
            return substr($zip, 0, 2) . ' ' . substr($zip, 2);
        }

        if ($countryAlpha2 === 'CU') {
            return 'CP' . $zip;
        }

        if (in_array($countryAlpha2, ['CZ', 'GR', 'SK'], true)) {
            return substr($zip, 0, 3) . ' ' . substr($zip, 3);
        }

        if ($countryAlpha2 === 'HT') {
            return substr($zip, 0, 2) . ' ' . substr($zip, 2);
        }

        if ($countryAlpha2 === 'IR') {
            return substr($zip, 0, 5) . '-' . substr($zip, 5);
        }

        if ($countryAlpha2 === 'LT') {
            return 'LT-' . $zip;
        }

        if ($countryAlpha2 === 'LU') {
            return 'L-' . $zip;
        }

        if ($countryAlpha2 === 'LV') {
            return 'LV-' . $zip;
        }

        if ($countryAlpha2 === 'MD') {
            return 'MD-' . $zip;
        }

        if ($countryAlpha2 === 'MT') {
            return strlen($zip) === 4
                ? substr($zip, 0, 2) . ' ' . substr($zip, 2)
                : substr($zip, 0, 3) . ' ' . substr($zip, 3);
        }

        if ($countryAlpha2 === 'NL') {
            return substr($zip, 0, 4) . ' ' . substr($zip, 4);
        }

        if ($countryAlpha2 === 'TW') {
            return strlen($zip) !== 3 && !str_contains($zip, '-')
                ? substr($zip, 0, 3) . '-' . substr($zip, 3)
                : $zip;
        }

        return $zip;
    }
}
