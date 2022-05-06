<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

final class Mail
{
    private readonly string $mail;

    public function __construct(string $mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException();
        }
        $this->mail = $mail;
    }

    public function get(): string
    {
        return $this->mail;
    }
}
