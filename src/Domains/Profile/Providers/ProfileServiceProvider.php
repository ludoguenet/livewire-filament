<?php

declare(strict_types=1);

namespace Domains\Profile\Providers;

use Domains\Profile\Queries\UserProfileQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Profile\Queries\UserProfileQueryContract;

class ProfileServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserProfileQueryContract::class => UserProfileQuery::class,
    ];

    public function boot(): void
    {

    }
}
