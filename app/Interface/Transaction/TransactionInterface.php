<?php
namespace App\Interface\Transaction;


interface UserTransactionInterface {


    public function getAllUsers();


    public function find($id);


    public function delete($id);

}