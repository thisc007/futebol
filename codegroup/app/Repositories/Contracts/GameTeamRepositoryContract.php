<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface GameTeamRepositoryContract
{
    public function getAllGameTeams();
    public function getGameTeamsByGameId(string $gameId);
    public function deleteGameTeams(String $gameteamsId);
    public function createGameTeams(array $gameteamsDetails);
    public function updateGameTeams(String $gameteamsId, array $newDetails);
    public function getInfoByGameTeams(String $select, String $where, String $groupby, String $orderby  );

}

