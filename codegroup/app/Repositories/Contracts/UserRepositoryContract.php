<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

interface UserRepositoryContract
{
    public function getAllUsers();
    public function getUserById(String $userId);
    public function deleteUser(String $userId);
    public function createUser(array $userDetails);
    public function updateUser(String $userId, array $newDetails);


}

