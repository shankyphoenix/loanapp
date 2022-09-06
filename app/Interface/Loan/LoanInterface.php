<?php
namespace App\Interface\Loan;


interface LoanInterface {


    public function getAllUsers();


    public function find($id);


    public function delete($id);

}