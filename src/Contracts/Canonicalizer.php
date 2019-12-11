<?php

namespace Boomdraw\Canonicalizer\Contracts;

interface Canonicalizer
{
    /**
     * Canonicalize string.
     *
     * @param string $string
     * @param bool $nullEmpty
     * @return string|null
     */
    public static function canonicalize(string $string, bool $nullEmpty = true): ?string;

    /**
     * Canonicalize email.
     *
     * @param string $email
     * @return string|null
     */
    public static function email(string $email): ?string;

    /**
     * Canonicalize slug.
     *
     * @param string $title
     * @param string $separator
     * @param string|null $language
     * @return string
     */
    public static function slug(string $title, string $separator = '-', ?string $language = 'en'): string;

    /**
     * Canonicalize url.
     *
     * @param string $url
     * @param string $separator
     * @return string
     */
    public static function url(string $url, string $separator = '-'): string;

    /**
     * Canonicalize uri.
     *
     * @param string $uri
     * @param string $separator
     * @return string
     */
    public static function uri(string $uri, string $separator = '-'): string;
}
