<?php

if ( ! function_exists('hash_pbkdf2')) {

    /**
     * Generate a PBKDF2 key derivation of a supplied password
     *
     * This is a hash_pbkdf2() implementation for PHP versions 5.3 and 5.4.
     * @link http://www.php.net/manual/en/function.hash-pbkdf2.php
     *
     * @param string $algo
     * @param string $password
     * @param string $salt
     * @param int $iterations
     * @param int $length
     * @param bool $rawOutput
     *
     * @return string
     */
    function hash_pbkdf2($algo, $password, $salt, $iterations, $length = 0, $rawOutput = false)
    {
        // check for hashing algorithm
        if ( ! in_array(strtolower($algo), hash_algos())) {
            trigger_error(sprintf(
                '%s(): Unknown hashing algorithm: %s',
                __FUNCTION__, $algo
            ), E_USER_WARNING);
            return false;
        }

        // check for type of iterations and length
        foreach (array(4 => $iterations, 5 => $length) as $index => $value) {
            if ( ! is_numeric($value)) {
                trigger_error(sprintf(
                    '%s() expects parameter %d to be long, %s given',
                    __FUNCTION__, $index, gettype($value)
                ), E_USER_WARNING);
                return null;
            }
        }

        // check iterations
        $iterations = (int) $iterations;
        if ($iterations <= 0) {
            trigger_error(sprintf(
                '%s(): Iterations must be a positive integer: %d',
                __FUNCTION__, $iterations
            ), E_USER_WARNING);
            return false;
        }

        // check length
        $length = (int) $length;
        if ($length < 0) {
            trigger_error(sprintf(
                '%s(): Iterations must be greater than or equal to 0: %d',
                __FUNCTION__, $length
            ), E_USER_WARNING);
            return false;
        }

        // check salt
        if (strlen($salt) > PHP_INT_MAX - 4) {
            trigger_error(sprintf(
                '%s(): Supplied salt is too long, max of INT_MAX - 4 bytes: %d supplied',
                __FUNCTION__, strlen($salt)
            ), E_USER_WARNING);
            return false;
        }

        // initialize
        $derivedKey = '';
        $loops = 1;
        if ($length > 0) {
            $loops = (int) ceil($length / strlen(hash($algo, '', $rawOutput)));
        }

        // hash for each blocks
        for ($i = 1; $i <= $loops; $i++) {
            $digest = hash_hmac($algo, $salt . pack('N', $i), $password, true);
            $block = $digest;
            for ($j = 1; $j < $iterations; $j++) {
                $digest = hash_hmac($algo, $digest, $password, true);
                $block ^= $digest;
            }
            $derivedKey .= $block;
        }

        if ( ! $rawOutput) {
            $derivedKey = bin2hex($derivedKey);
        }

        if ($length > 0) {
            return substr($derivedKey, 0, $length);
        }

        return $derivedKey;
    }

    // test
    if (realpath($_SERVER['argv'][0]) === __FILE__ && function_exists('hash_pbkdf2')) {
        $password = 'password';
        $savedPassword = 'sha256,salt,65536,4156f668bb31db3a17f4d1b91424ef0d417ad1f35d055aceaebd8da0f6a44b7e';
        list($algo, $salt, $iterations, $hash) = explode(',', $savedPassword);

        var_dump(
            $hash,
            hash_pbkdf2($algo, $password, $salt, $iterations, strlen($hash)),
            compat_pbkdf2($algo, $password, $salt, $iterations, strlen($hash))
        );
    }

}