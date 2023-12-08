<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\GameRepositoryContract;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameRepository implements GameRepositoryContract
{

    public function getAllGames()
    {
        return Game::all();
    }

    public function getGameById(string $gameId)
    {
        $game = Game::findOrFail($gameId);
        return $game;
    }

    public function deleteGame(string $gameId)
    {
        //return Game::destroy($gameId);
        return Game::whereId($gameId)->delete();
    }

    public function createGame(array $gameDetails)
    {
        return Game::create($gameDetails);
    }

    public function updateGame(string $gameId, array $newDetails)
    {
        return Game::whereId($gameId)->update($newDetails);
    }

    public function getInfoByGames(String $select, String $where, String $groupby, String $orderby ){
        $query = DB::table('games');
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