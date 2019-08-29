<?php

namespace PasswordHasher;

class PasswordHasher
{

    /**
     * hash password
     * @param string $password
     * @return string $hash
     */
    public function hash(
        string $password
    ) {
        return password_hash(
            $password,
            PASSWORD_DEFAULT
        );
    }

    /**
     * verify if password is valid
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function isValid(
        string $password,
        string $hash
    ) {
        return password_verify(
            $password,
            $hash
        );
    }
}
