<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Queries;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

interface UserProfileQueryContract
{
    public function handle(Authenticatable $user): Model;
}
