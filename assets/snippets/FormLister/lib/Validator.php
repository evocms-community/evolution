<?php namespace FormLister;

/**
 * Class Validator
 * @package FormLister
 *  */
class Validator
{
    /**
     * @param $value
     * @return bool
     */
    public static function required($value): bool
    {
        return !in_array($value, [null, ''], true);
    }

    /**
     * @param $value
     * @param $format
     * @return bool
     */
    public static function date($value, $format): bool
    {
        if (!is_scalar($value)) {
            return false;
        }
        $d = \DateTime::createFromFormat($format, $value);
        return $d && $d->format($format) == $value;
    }

    /**
     * @param $value
     * @param $min
     * @return bool
     */
    public static function min($value, $min): bool
    {
        return is_scalar($value) && $value >= $min;
    }

    /**
     * @param $value
     * @param $max
     * @return bool
     */
    public static function max($value, $max): bool
    {
        return is_scalar($value) && $value <= $max;
    }

    /**
     * @param $value
     * @param $min
     * @return bool
     */
    public static function greater($value, $min): bool
    {
        return is_scalar($value) && $value > $min;
    }

    /**
     * @param $value
     * @param $max
     * @return bool
     */
    public static function less($value, $max): bool
    {
        return is_scalar($value) && $value < $max;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @param  bool  $strict
     * @return bool
     */
    public static function between($value, $min, $max, $strict = false): bool
    {
        return (is_scalar($value) && ($strict ? $value > $min && $value < $max : $value >= $min && $value <= $max));
    }

    /**
     * @param $value
     * @param $allowed
     * @return bool
     */
    public static function equals($value, $allowed): bool
    {
        return is_scalar($value) && $value === $allowed;
    }

    /**
     * @param $value
     * @param  array  $allowed
     * @return bool
     */
    public static function in($value, $allowed): bool
    {
        return is_scalar($value) && in_array($value, $allowed, true);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function alpha($value): bool
    {
        return (bool) is_scalar($value) && preg_match('/^\pL++$/uD', $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function numeric($value): bool
    {
        return (bool) is_scalar($value) && preg_match('/^[0-9]+$/', $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function alphaNumeric($value): bool
    {
        return (bool) is_scalar($value) && preg_match('/^[\pL\pN]++$/uD', $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function slug($value): bool
    {
        return (bool) is_scalar($value) && preg_match('/^[\pL\pN\-\_]++$/uD', $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function decimal($value): bool
    {
        return (bool) is_scalar($value) && preg_match('/^[0-9]+(?:\.[0-9]+)?$/D', $value);
    }


    /**
     * @param $value
     * @return bool
     */
    public static function phone($value): bool
    {
        return (bool) is_scalar($value) && preg_match('#^[0-9\(\)\+ \-]+$#', $value);
    }

    /**
     * @param $value
     * @param $regexp
     * @return bool
     */
    public static function matches($value, $regexp): bool
    {
        return (bool) is_scalar($value) && preg_match($regexp, $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function url($value): bool
    {
        return (bool) is_scalar($value) && preg_match(
                '~^
                [-a-z0-9+.]++://
                (?!-)[-a-z0-9]{1,63}+(?<!-)
                (?:\.(?!-)[-a-z0-9]{1,63}+(?<!-)){0,126}+
                (?::\d{1,5}+)?
                (?:/.*)?
            $~iDx',
                $value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function email($value): bool
    {
        return (bool) is_scalar($value) && filter_var(self::sanitizeEmail($value), FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param $value
     * @param $length
     * @return bool
     */
    public static function length($value, $length): bool
    {
        if (!is_scalar($value)) {
            return false;
        }

        return self::getLength($value) === $length;
    }

    /**
     * @param $value
     * @param $minLength
     * @param  bool  $strict
     * @return bool
     */
    public static function minLength($value, $minLength, $strict = false): bool
    {
        if (!is_scalar($value)) {
            return false;
        }
        $length = self::getLength($value);

        return $strict ? $length > $minLength : $length >= $minLength;
    }

    /**
     * @param $value
     * @param $maxLength
     * @param  bool  $strict
     * @return bool
     */
    public static function maxLength($value, $maxLength, $strict = false): bool
    {
        if (!is_scalar($value)) {
            return false;
        }
        $length = self::getLength($value);

        return $strict ? $length < $maxLength : $length <= $maxLength;
    }

    /**
     * @param $value
     * @param $minLength
     * @param $maxLength
     * @param  bool  $strict
     * @return bool
     */
    public static function lengthBetween($value, $minLength, $maxLength, $strict = false): bool
    {
        if (!is_scalar($value)) {
            return false;
        }
        $length = self::getLength($value);

        return $strict ? $length > $minLength && $length < $maxLength : $length >= $minLength && $length <= $maxLength;
    }

    /**
     * @param $value
     * @param $minSize
     * @param  bool  $strict
     * @return bool
     */
    public static function minCount($value, $minSize, $strict = false): bool
    {
        if (!is_array($value)) {
            return false;
        }
        $count = count($value);

        return $strict ? $count > $minSize : $count >= $minSize;
    }

    /**
     * @param $value
     * @param $maxSize
     * @param  bool  $strict
     * @return bool
     */
    public static function maxCount($value, $maxSize, $strict = false): bool
    {
        if (!is_array($value)) {
            return false;
        }
        $count = count($value);

        return $strict ? $count < $maxSize : $count <= $maxSize;
    }

    /**
     * @param $value
     * @param $minSize
     * @param $maxSize
     * @param  bool  $strict
     * @return bool
     */
    public static function countBetween($value, $minSize, $maxSize, $strict = false): bool
    {
        if (!is_array($value)) {
            return false;
        }
        $count = count($value);

        return $strict ? $count > $minSize && $count < $maxSize : $count >= $minSize && $count <= $maxSize;
    }

    /**
     * @param $string
     * @return int
     */
    protected static function getLength($string)
    {
        return mb_strlen($string);
    }

    /**
     * @param $email
     * @return string
     */
    protected static function sanitizeEmail($email)
    {
        if (function_exists('idn_to_ascii')) {
            $_email = explode('@', $email);
            $_email[1] = $_email[1] ?? '';
            if (defined('IDNA_NONTRANSITIONAL_TO_ASCII') && defined('INTL_IDNA_VARIANT_UTS46')) {
                $_email[1] = idn_to_ascii($_email[1], IDNA_NONTRANSITIONAL_TO_ASCII, INTL_IDNA_VARIANT_UTS46);
            } else {
                $_email[1] = idn_to_ascii($_email[1]);
            }
            $email = implode('@', $_email);
        }

        return $email;
    }
}
