<?php
namespace App\Interface\User;


interface UserInterface {


    public function getAllUsers();


    public function find($id);


    public function delete($id);

}