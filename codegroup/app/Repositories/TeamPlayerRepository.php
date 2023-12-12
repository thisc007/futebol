<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\TeamPlayerRepositoryContract;
use App\Models\Teamplayer;
use Illuminate\Support\Facades\DB;

class TeamPlayerRepository implements TeamPlayerRepositoryContract
{

    public function getAllTeamPlayers(int $gameId)
    {
        $query = DB::table('players');

        $query->selectRaw('last_name, first_name, level, (select x.team from teamplayers as x where x.player_id = players.id) as team');
        $query->whereRaw('id in (select x.player_id from teamplayers x where x.game_id = ' . $gameId . ')');
        $query->orderByRaw('(select x.team from teamplayers as x where x.player_id = players.id)');
        return $query->get();
    }


    public function createTeamPlayer(array $teamplayerDetails)
    {
        return Teamplayer::create($teamplayerDetails);
    }
}