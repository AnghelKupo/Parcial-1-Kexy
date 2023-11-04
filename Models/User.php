<?php
class User {
    private $id_user;
    private $email;
    private $pass;
    private $pic;
    private $name;
    private $last_name;
    private $role;

    public function getIdUser() {
        return $this->id_user;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getPic() {
        return $this->pic;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getRole() {
        return $this->role;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setPic($pic) {
        $this->pic = $pic;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function fromArray($resultArray) {
        $this->id_user = $resultArray['id_user'] ?? null;
        $this->email = $resultArray['email'] ?? null;
        $this->pass = $resultArray['pass'] ?? null;
        $this->pic = $resultArray['pic'] ?? null;
        $this->name = $resultArray['name'] ?? null;
        $this->last_name = $resultArray['last_name'] ?? null;
        $this->role = $resultArray['role'] ?? null;
    }

}