<?php

class CryptoGuardTest extends PHPUnit_Framework_TestCase
{

    public function testEncryption()
    {
        require __DIR__ . '/../vendor/autoload.php';

        $passphrase = 'test-passphrase';

        $cryptoGuard = new \Coreproc\CryptoGuard\CryptoGuard($passphrase);

        $stringToEncrypt = 'test string to encrypt';

        $encryptedText = $cryptoGuard->encrypt($stringToEncrypt);

        $decryptedText = $cryptoGuard->decrypt($encryptedText);

        $this->assertEquals($stringToEncrypt, $decryptedText);
    }

}