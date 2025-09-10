<?php

function enkripSHA256($text): string|bool
{
	try {
		if(empty($text)) {
			return false;
		}
		
		$key = config('encryption.key');
		$iv = config('encryption.iv');
		
		return base64_encode(openssl_encrypt(
			$text,
			'AES-256-CBC',
			$key,
			0,
			$iv
		));
	} catch (Exception $e) {
		return false;
	}
}

function dekripSHA256($text): string|bool
{
	try {
		if(empty($text)) {
			return false;
		}
		$key = config('encryption.key');
		$iv = config('encryption.iv');
		
		return openssl_decrypt(
			base64_decode($text),
			'AES-256-CBC',
			$key,
			0,
			$iv
		);
	} catch (Exception $e) {
		return false;
	}
}

/**
 * Encrypting a value
 * @param string $value
 * @return string
 */
function enkrip(string $value): string
{
	try {
		return Illuminate\Support\Facades\Crypt::encryptString($value);
	} catch (Illuminate\Contracts\Encryption\EncryptException $e) {
		return $e->getMessage();
	}
}

/**
 * Decrypting a value
 * @param string $value
 * @return string
 */
function dekrip(string $value): string
{
	try {
		return Illuminate\Support\Facades\Crypt::decryptString($value);
	} catch (Illuminate\Contracts\Encryption\DecryptException $e) {
		return $e->getMessage();
	}
}