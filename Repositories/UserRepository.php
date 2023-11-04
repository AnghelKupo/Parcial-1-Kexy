<?php
require_once '../Models/User.php';
require_once '../Config/ConnectionDB.php';

class UserRepository {

    public function getByEmailPass($email, $pass): User | bool {/*Que pasa si en vez de null lo pongo boleano? afecto?  */
        
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $user = false;

        try {

            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $user = New User();
                $user->fromArray($results[0]);


                if(!password_verify($pass, $user->getPass())) {
                    echo "Datos Incorrectos";
                    return false;
                }
            }
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function getAll(): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $users = [];
        $sql = "SELECT * FROM Users";

        try {
            $query = $connection->query($sql);

            if($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    $user = new User();
                    $user->fromArray($row);
                    array_push($users, $user);
                }
            }

            return $users;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return [];
        }
    }

    public function updateUserById($id_user, array $data): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $users = [];
        $sql = "SELECT * FROM users WHERE id_user = '$id_user'";
        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    $user = new User();
                    $user->fromArray($row);
                    array_push($users, $user);
                }
            }

            return $users;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return [];
        }

    }

    public function insertUser(array $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO users ( email, pass, pic, name, last_name, role) VALUES(:id_user, ::email, :pass, :pic, :name, :last_name, :role)";
        try {
            $stmt = $connection->prepare($sql);
            $hash_password = password_hash($data["password"], PASSWORD_DEFAULT);

            $stmt->bindParam("email", $data["email"]);
            $stmt->bindParam("password", $hash_password);
            $stmt->bindParam("name", $data["name"]);
            $stmt->bindParam("last_name", $data["last_name"]);
            $stmt->bindParam("role", $data["role"]);

            if (isset($data["pic"])) {
                $stmt->bindParam(':pic', $data["pic"], PDO::PARAM_LOB);
            } else {
                $stmt->bindValue(':pic', null, PDO::PARAM_NULL);
            }

            if ($stmt->execute()) {
                return true;
            }
            return false;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function deleteUserById(int $id_user): bool {
        return false;  
    }

}
