<?php

namespace Boomdraw\Canonicalizer\Repositories;

use Boomdraw\Canonicalizer\Contracts\Canonicalizer as CanonicalizerContract;
use Illuminate\Support\Traits\Macroable;

class Canonicalizer implements CanonicalizerContract
{
    use Macroable;

    /**
     * Canonicalize string.
     *
     * @param string $string
     * @param bool $nullEmpty
     * @return string|null
     */
    public static function canonicalize(string $string, bool $nullEmpty = true): ?string
    {
        if ('' === $string) {
            return $nullEmpty ? null : '';
        }

        $encoding = mb_detect_encoding($string);

        $result = $encoding
            ? mb_convert_case($string, MB_CASE_LOWER, $encoding)
            : mb_convert_case($string, MB_CASE_LOWER);

        return $result;
    }

    /**
     * Canonicalize email.
     *
     * @param string $email
     * @return string|null
     */
    public static function canonicalizeEmail(string $email): ?string
    {
        if (false === strpos($email, '@')) {
            return null;
        }

        $email = self::canonicalize($email);
        $emailExploded = explode('@', $email);
        $email = str_replace('.', '', $emailExploded[0]);
        $email .= '@'.$emailExploded[1];

        return $email;
    }
}
