<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface GamePlayerRepositoryContract
{
    public function getAllGamePlayers();
    public function getGamePlayersByGameId(string $gameId);
    public function deleteGamePlayers(String $gameplayersId);
    public function createGamePlayers(array $gameplayersDetails);
    public function updateGamePlayers(String $gameplayersId, array $newDetails);
    public function getInfoByGamePlayers(String $select, String $where, String $groupby, String $orderby  );

}

