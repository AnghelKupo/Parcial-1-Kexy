<?php
require_once '../Models/User.php';
require_once '../Config/ConnectionDB.php';

class UserRepository {

    public function getByEmailPass($email, $pass): User | null {/*Que pasa si en vez de null lo pongo boleano? afecto?  */
        
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $user = null;

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
                    return null;
                }
            }
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
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

    public function getById($id_user): User | null{
        $connection = ConnectionDB::getInstance()->getConnection();
        $user = null;
        $sql = "SELECT * FROM Users WHERE id_user = $id_user";

        try {
            $query = $connection->query($sql);

            if ($query->rowCount() > 0) {
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                $user = New User();
                $user->fromArray($results[0]);
            }
            return $user;

        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }


    public function updateUserById($id_user, array $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $users = [];
        $sql = "UPDATE users SET name = :name, last_name = :last_name, email = :email WHERE id_user = :id_user";
        
        try {
            $stmt = $connection->prepare($sql);

            $stmt->bindParam("id_user", $id_user, PDO::PARAM_INT);
            $stmt->bindParam("name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam("email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam("last_name", $data["last_name"], PDO::PARAM_STR);

            if( $stmt->execute()){
                echo"ACTUALIZACIÓN EXISTOSA";
                return true;

            }else{
                echo "FALLO AL ACTUALIZAR LOS DATOS";
                return false;
            }
        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return false;
        }
    }

    public function insertUser(array $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "INSERT INTO users ( email, pass, name, last_name) VALUES(:email, :pass, :name, :last_name)";
        try {
            $stmt = $connection->prepare($sql);
            $hash_password = password_hash($data["pass"], PASSWORD_DEFAULT);

            $stmt->bindParam("email", $data["email"]);
            $stmt->bindParam("pass", $hash_password);
            $stmt->bindParam("name", $data["name"]);
            $stmt->bindParam("last_name", $data["last_name"]);

            if ($stmt->execute()) {
                return true;
            }
            return false;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function insertPic( $id_user,array $data): bool {
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "UPDATE users SET pic = :pic WHERE id_user = :id_user";

        try {
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(":pic", $data["pic"], PDO::PARAM_LOB);
            $stmt->bindParam(":id_user", $id_user, PDO::PARAM_INT);


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
        $connection = ConnectionDB::getInstance()->getConnection();
        $sql = "DELETE FROM users WHERE id_user = :id_user";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                echo "ELIMINACIÓN EXITOSA";
                return true;
            } else {
                echo "ERRO AL ELIMINAR"; 
                return false;
            }
        } catch (PDOException $e) {
            echo  $e->getMessage(); // Manejo de excepciones
            return false;
        }
    }
}
