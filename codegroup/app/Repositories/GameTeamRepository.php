<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\GameTeamRepositoryContract;
use App\Models\Gameteam;
use Illuminate\Support\Facades\DB;

class GameTeamRepository implements GameTeamRepositoryContract
{

    public function getAllGameTeams()
    {
        return Gameteam::all();
    }

    public function getGameTeamsByGameId(string $gameId)
    {
        $gameteam = Gameteam::findOrFail($gameId)->all();
        return $gameteam;
    }

    public function deleteGameTeams(string $gameteamId)
    {
        //return GameTeam::destroy($gameteamId);
        return Gameteam::whereId($gameteamId)->delete();
    }

    public function createGameTeams(array $gameteamDetails)
    {
        return Gameteam::create($gameteamDetails);
    }

    public function updateGameTeams(string $gameteamId, array $newDetails)
    {
        return Gameteam::whereId($gameteamId)->update($newDetails);
    }

    public function getInfoByGameTeams(String $select, String $where, String $groupby, String $orderby ){
        $query = DB::table('gameteams');
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