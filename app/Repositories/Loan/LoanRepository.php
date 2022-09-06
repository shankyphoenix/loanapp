<?php
namespace App\Repositories\Loan;

use App\Interface\Loan\LoanInterface as LoanInterface;
use App\Models\Loan;

class LoanRepository implements LoanInterface 
{

    public $user;

    function __construct(Loan $user) 
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