<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface PlayerRepositoryContract
{
    public function getAllPlayers();
    public function getPlayerById(String $playerId);
    public function deletePlayer(String $playerId);
    public function createPlayer(array $playerDetails);
    public function updatePlayer(String $playerId, array $newDetails);
    public function getInfoByPlayers(String $select, String $where, String $groupby, String $orderby  );
}

