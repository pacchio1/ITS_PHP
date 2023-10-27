<?php

declare(strict_types=1);

namespace App;

class Filter
{
    public function isEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}
