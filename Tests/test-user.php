<?php
require_once '../Models/Note.php';
require_once '../Models/User.php';
require_once '../Repositories/UserRepository.php';


$ur = new UserRepository();


// echo var_dump( $ur->getAll() );

// echo  $ur->getByEmailPass('ana@ana.com','12345' );


// echo  $ur->deleteUserById(4);

// echo  $ur->insertUser( [
//     'email' => 'ana@ana.com',
//     'name' => 'Ana',
//     'last_name'=> 'Valencia',
//     'password' => password_hash('12345', PASSWORD_DEFAULT ),

//     ] );

 echo  $ur->updateUserById(2, [
     'email' => 'ana@ana.com'
     ] );


