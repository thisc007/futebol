<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\UserRepository;

use App\Repositories\Contracts\PlayerRepositoryContract;
use App\Repositories\PlayerRepository;

use App\Repositories\Contracts\GameRepositoryContract;
use App\Repositories\GameRepository;

use App\Repositories\Contracts\GamePlayerRepositoryContract;
use App\Repositories\GamePlayerRepository;

use App\Repositories\Contracts\GameTeamRepositoryContract;
use App\Repositories\GameTeamRepository;

use App\Repositories\Contracts\TeamPlayerRepositoryContract;
use App\Repositories\TeamPlayerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(PlayerRepositoryContract::class, PlayerRepository::class);
        $this->app->bind(GameRepositoryContract::class, GameRepository::class);
        $this->app->bind(GamePlayerRepositoryContract::class, GamePlayerRepository::class);
        $this->app->bind(GameTeamRepositoryContract::class, GameTeamRepository::class);
        $this->app->bind(TeamPlayerRepositoryContract::class, TeamPlayerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
