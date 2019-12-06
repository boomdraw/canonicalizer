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
    public static function canonicalizeEmail(string $email): ?string;
}
