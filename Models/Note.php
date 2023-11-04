<?php
class Note {
    private $id_note;
    private $title;
    private $description;
    private $date;
    private $user_id;

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

    public function getUserId() {
        return $this->user_id;
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

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    
}