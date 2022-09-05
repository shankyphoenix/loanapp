<?php
namespace App\Repositories\User;

use App\Interface\User\UserInterface as UserInterface;
use App\Models\User;

class UserRepository implements UserInterface 
{

    public $user;

    function __construct(User $user) 
    {	
        $this->user = $user;
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->findUser($id);
    }

    public function delete($id)
    {
        return $this->user->deleteUser($id);
    }

}