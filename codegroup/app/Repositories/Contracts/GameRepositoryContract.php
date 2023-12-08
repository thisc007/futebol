<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface GameRepositoryContract
{
    public function getAllGames();
    public function getGameById(String $gameId);
    public function deleteGame(String $gameId);
    public function createGame(array $gameDetails);
    public function updateGame(String $gameId, array $newDetails);
    public function getInfoByGames(String $select, String $where, String $groupby, String $orderby  );

}

