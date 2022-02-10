<?php

namespace Altelma\LaravelStrExtension;

use Illuminate\Support\Str;

class StringHelper
{
    private const SEPARATOR = '-';

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param string $string
     *
     * @return string
     */
    public static function slugUtf8(string $string) : string
    {
        // Convert all underscores into separator
        $string = preg_replace('![' . preg_quote('_') . ']+!u', self::SEPARATOR, $string);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $string = preg_replace('![^' . preg_quote(self::SEPARATOR) . '\pL\pN\s\p{Thai}]+!u', '', $string);

        // Replace all separator characters and whitespace by a single separator
        $string = preg_replace('![' . preg_quote(self::SEPARATOR) . '\s]+!u', self::SEPARATOR, $string);

        $string = Str::lower($string);

        return trim($string, self::SEPARATOR);
    }
}
