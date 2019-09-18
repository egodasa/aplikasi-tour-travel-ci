<?php namespace Coreproc\CryptoGuard;

class CryptoGuard
{

    private $passphrase;
    private $key;
    private $salt;
    private $iv;

    public function __construct($passphrase)
    {
        $this->passphrase = $passphrase;
    }

    public function encrypt($plaintext)
    {
        $this->generateSalt();
        $this->generateIv();

        $this->generateKey($this->passphrase);

        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $plaintext, MCRYPT_MODE_CBC, $this->iv);

        $data_return = array();
        $data_return['iv'] = base64_encode($this->iv);
        $data_return['salt'] = base64_encode($this->salt);
        $data_return['ciphertext'] = base64_encode($ciphertext);

        return base64_encode(json_encode($data_return));
    }

    public function decrypt($data_enciphered)
    {
        $data_decoded = json_decode(base64_decode($data_enciphered), true);

        $this->setIv(base64_decode($data_decoded['iv']));
        $this->setSalt(base64_decode($data_decoded['salt']));
        $this->generateKey($this->passphrase);

        $ciphertext = base64_decode($data_decoded['ciphertext']);

        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $ciphertext, MCRYPT_MODE_CBC, $this->iv));
    }

    private function setSalt($salt)
    {
        $this->salt = $salt;
    }

    private function generateSalt()
    {
        $this->salt = mcrypt_create_iv(32, MCRYPT_DEV_RANDOM); // abuse IV function for random salt
    }

    private function setIv($iv)
    {
        $this->iv = $iv;
    }

    private function generateIv()
    {
        $this->iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
    }

    private function generateKey($passphrase, $iterations = 10000, $length = 32)
    {
        $this->key = hash_pbkdf2('sha256', $passphrase, $this->salt, $iterations, $length);
    }

}