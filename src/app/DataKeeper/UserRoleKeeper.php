<?php

declare(strict_types=1);

namespace App\DataKeeper;

final class UserRoleKeeper
{
    public const ADMIN = 'admin';
    public const EDITOR = 'editor';
    public const AUTHOR = 'author';
    public const SUBSCRIBER = 'subscriber';

    public static function list(): array
    {
        return [
            self::ADMIN,
            self::EDITOR,
            self::AUTHOR,
            self::SUBSCRIBER,
        ];
    }
}
