<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public const ADMINISTRATOR = 'Administrator';
    public const MODERATOR = 'Moderator';
    public const AUTHOR = 'Author';
}
