<?php

use PasswordHasher\PasswordHasher;
use PHPUnit\Framework\TestCase;

class PasswordHasherTest extends TestCase
{

    /**
     * @covers PasswordHasher\PasswordHasher::hash
     */
    public function testHash()
    {
        $passwordHasher = new PasswordHasher();
        $pass = 'test';
        $hash = $passwordHasher->hash($pass);
        $isValid = password_verify(
            $pass,
            $hash
        );
        $this->assertInstanceOf(PasswordHasher::class, $passwordHasher);
        $this->assertTrue($isValid);
    }

    /**
     * @covers PasswordHasher\PasswordHasher::isValid
     */
    public function testIsValid()
    {
        $passwordHasher = new PasswordHasher();
        $pass = 'test';
        $hash = password_hash(
            $pass,
            PASSWORD_DEFAULT
        );
        $isValid = $passwordHasher->isValid($pass, $hash);
        $this->assertInstanceOf(PasswordHasher::class, $passwordHasher);
        $this->assertTrue($isValid);
    }

    /**
     * @covers PasswordHasher\PasswordHasher::isValid
     */
    public function testIsInvalid()
    {
        $passwordHasher = new PasswordHasher();
        $pass = 'test';
        $hash = password_hash(
            $pass,
            PASSWORD_DEFAULT
        );
        $isValid = $passwordHasher->isValid('test2', $hash);
        $this->assertInstanceOf(PasswordHasher::class, $passwordHasher);
        $this->assertFalse($isValid);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
