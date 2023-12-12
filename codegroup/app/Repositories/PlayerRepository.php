<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\PlayerRepositoryContract;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PlayerRepository implements PlayerRepositoryContract
{

    public function getAllPlayers()
    {
        return Player::all();
    }
    public function getAllGK()
    {
        return Player::where('is_goalkeeper = true')->get();
    }

    public function getAllLinePlayers()
    {
        return Player::where('is_goalkeeper = false')->orderby('level', 'desc')->get();
    }


    public function getPlayerById(string $playerId)
    {
        $player = Player::findOrFail($playerId);
        return $player;
    }

    public function deletePlayer(string $playerId)
    {
        //return Player::destroy($playerId);
        return Player::whereId($playerId)->delete();
    }

    public function createPlayer(array $playerDetails)
    {
        return Player::create($playerDetails);
    }

    public function updatePlayer(string $playerId, array $newDetails)
    {
        return Player::whereId($playerId)->update($newDetails);
    }

    public function getInfoByPlayers(String $select, String $where, String $groupby, String $orderby ){
        $query = DB::table('players');
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