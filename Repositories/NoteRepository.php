<?php
require_once '../Models/Note.php';
require_once '../Config/ConnectionDB.php';

class NoteRepository {

    public function getAll(): array {
        $sql = "SELECT 
            Notes.id_note, 
            Notes.title, 
            Notes.description, 
            Notes.date, 
            Users.name, 
            Users.last_name
            FROM Notes
            INNER JOIN Users ON Notes.user_id = Users.id_user";
        
        return $this->arrayFormat($sql);
    }

    public function getNoteById($id_note): Note | null {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT 
            Notes.id_note, 
            Notes.title, 
            Notes.description, 
            Notes.date, 
            Users.name, 
            Users.last_name
            FROM Notes
            INNER JOIN Users ON Notes.user_id = Users.id_user
            WHERE Notes.id_note = :id_note";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":id_note", $id_note, PDO::PARAM_INT);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                $note = new Note();
                $note->fromArray($stmt->fetch(PDO::FETCH_ASSOC));
                return $note;
            } else {
                return null;
            }
        }
        catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }

    public function getAllByUserId($user_id): array {
        $sql = "SELECT 
            Notes.id_note, 
            Notes.title, 
            Notes.description, 
            Notes.date, 
            Users.name, 
            Users.last_name
            FROM Notes
            INNER JOIN Users ON Notes.user_id = Users.id_user
            WHERE Notes.user_id = $user_id";

        return $this->arrayFormat($sql);
    }

    public function insertNoteByUserId($user_id, $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO Notes (title, description, user_id) VALUES (:title, :description, :user_id)";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":title", $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(":description", $data['description'], PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    public function updateNoteById($id_note, $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "UPDATE Notes SET title = :title, description = :description WHERE id_note = :id_note";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":title", $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(":description", $data['description'], PDO::PARAM_STR);
            $stmt->bindParam(":id_note", $id_note, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    public function deleteNoteById($id_note): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "DELETE FROM Notes WHERE id_note = :id_note";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":id_note", $id_note, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    private function arrayFormat($sql): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $notes = [];
        try {
            $query = $connection->query($sql);

            if( $query->rowCount() > 0) {
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach( $resultado as $row ) {
                    $note = new Note();
                    $note->fromArray($row);
                    array_push($notes, $note);
                }
            }

            return $notes;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return [];
        }
    }

}