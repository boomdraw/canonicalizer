<?php

namespace Boomdraw\Canonicalizer\Repositories;

use Boomdraw\Canonicalizer\Contracts\Canonicalizer as CanonicalizerContract;
use Illuminate\Support\Str;
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
    public static function email(string $email): ?string
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

    /**
     * Canonicalize slug.
     *
     * @param string $title
     * @param string $separator
     * @param string|null $language
     * @return string
     */
    public static function slug(string $title, string $separator = '-', ?string $language = 'en'): string
    {
        return Str::slug($title, $separator, $language);
    }

    /**
     * Canonicalize url.
     *
     * @param string $url
     * @param string $separator
     * @return string
     */
    public static function url(string $url, string $separator = '-'): string
    {
        $url = trim($url, " \t\n\r\0\x0B/\\");
        $url = explode('/', $url);
        array_walk($url, function (&$item) use ($separator) {
            $item = Str::slug($item, $separator);
        });

        return implode('/', $url);
    }

    /**
     * Canonicalize uri.
     *
     * @param string $uri
     * @param string $separator
     * @return string
     */
    public static function uri(string $uri, string $separator = '-'): string
    {
        return self::url($uri, $separator);
    }
}
