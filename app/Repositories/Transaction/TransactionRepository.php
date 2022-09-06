<?php
namespace App\Repositories\Transaction;

use App\Interface\Transaction\TransactionInterface as TransactionInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionInterface 
{

    public $user;

    function __construct(UserTransaction $user) 
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