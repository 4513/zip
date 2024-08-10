<?php

declare(strict_types=1);

namespace MiBo\ZIP;

use RuntimeException;
use Throwable;

/**
 * Class InvalidZIPException
 *
 * @package MiBo\ZIP
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class InvalidZIPException extends RuntimeException implements Throwable
{
}
