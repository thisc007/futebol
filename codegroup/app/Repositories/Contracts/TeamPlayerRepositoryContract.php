<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface TeamPlayerRepositoryContract
{
    public function getAllTeamPlayers(int $gameId);

    public function createTeamPlayer(array $teamplayerDetails);



}

