<?php

declare(strict_types=1);

namespace Domains\Profile\Queries;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Infrastructure\Profile\Queries\UserProfileQueryContract;

class UserProfileQuery implements UserProfileQueryContract
{
    public function handle(Authenticatable $user): Model
    {
        return Profile::query()
            ->whereBelongsTo($user, 'owner')
            ->first();
    }
}
