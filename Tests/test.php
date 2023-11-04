<?php
require_once '../Config/ConnectionDB.php';
require_once '../Models/User.php';
require_once '../Models/Note.php';
require_once '../Repositories/UserRepository.php';

$ur = new UserRepository();

echo var_dump($ur->getAll());