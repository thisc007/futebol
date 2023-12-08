<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\GamePlayerRepositoryContract;
use App\Models\Gameplayer;
use Illuminate\Support\Facades\DB;

class GamePlayerRepository implements GamePlayerRepositoryContract
{

    public function getAllGamePlayers()
    {
        return Gameplayer::all();
    }

    public function getGamePlayersByGameId(string $gameId)
    {
        $gameplayer = Gameplayer::findOrFail($gameId)->all();
        return $gameplayer;
    }

    public function deleteGamePlayers(string $gameplayerId)
    {
        //return GamePlayer::destroy($gameplayerId);
        return Gameplayer::whereId($gameplayerId)->delete();
    }

    public function createGamePlayers(array $gameplayerDetails)
    {
        return Gameplayer::create($gameplayerDetails);
    }

    public function updateGamePlayers(string $gameplayerId, array $newDetails)
    {
        return Gameplayer::whereId($gameplayerId)->update($newDetails);
    }

    public function getInfoByGamePlayers(String $select, String $where, String $groupby, String $orderby ){
        $query = DB::table('gameplayers');
        if($select != '')
        {
            $query->selectRaw($select);
        }

        if($where != '')
        {
            $query->whereRaw($where);
        }

        if($groupby != ''){
            $query->groupByRaw($groupby);
        }

        if($orderby != ''){
            $query->orderByRaw($orderby);
        }


        return $query->get();

    }


}