<?php
class Note {
    private $id_note;
    private $title;
    private $description;
    private $date;
    private User $user;

    public function getId() {
        return $this->id_note;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUser() {
        return $this->user;
    }

    public function setIdNode($id_note) {
        $this->id_note = $id_note;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function fromArray(array $resultArray) {
        $this->id_note = $resultArray['id_note'] ?? null;
        $this->title = $resultArray['title'] ?? null;
        $this->description = $resultArray['description'] ?? null;
        $this->date = $resultArray['date'] ?? null;
        
        $this->user = new User();
        $this->user->setName($resultArray['name']) ?? null;
        $this->user->setLastName($resultArray['last_name']) ?? null;
    }
    
}