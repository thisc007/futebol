<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract{

    public function getAllUsers(){
        return User::all();
    }

    public function getUserById(String $userId){
       
        if($userId != 0 )
        {
            $user = User::findOrFail($userId);
            return $user;
        }
        else {
            return 0;
        }
    }

    public function deleteUser(String $userId){
        //return User::destroy($userId);
        return User::whereId($userId)->delete();
    }

    public function createUser(array $userDetails){
        return User::create($userDetails);
    }

    public function updateUser(String $userId, array $newDetails){
        return User::whereId($userId)->update($newDetails);
    }

   

  
}