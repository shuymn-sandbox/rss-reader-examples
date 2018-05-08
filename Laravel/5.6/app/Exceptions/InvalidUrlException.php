<?php
declare(strict_types=1);

namespace App\Exceptions;

use ErrorException;
use Exception;

/**
 * Class InvalidUrlException
 * @package App\Exceptions
 */
final class InvalidUrlException extends ErrorException
{
    /**
     * InvalidUrlException constructor.
     * @param string $message
     * @param int $code
     * @param int $severity
     * @param string $filename
     * @param int $lineno
     * @param Exception|null $previous
     */
    public function __construct(
        string $message = "",
        int $code = 0,
        int $severity = 1,
        string $filename = __FILE__,
        int $lineno = __LINE__,
        Exception $previous = null
    ) {
        parent::__construct($message, 500, $severity, $filename, $lineno, $previous);
    }
}
