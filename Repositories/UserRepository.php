<?php
require_once '../Models/User.php';
require_once '../Config/ConnectionDB.php';

class UserRepository {

    public function getByEmailPass($email, $pass): User | null {
        echo 'Método no implementado, borrar esta parte cuando se haga';
        return null;
    }

    public function getAll(): array {
        $connection = ConnectionDB::getInstance()->getConnection();
        $users = [];
        $sql = "SELECT * FROM Users";

        try {
            $query = $connection->query($sql);

            if($query->rowCount() > 0) {
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($resultado as $row) {
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

    public function updateUserById($id_user, array $data): bool {
        echo 'Método no implementado, borrar esta parte cuando se haga';
        return false;
    }

    public function insertUser(array $data): bool {
        echo 'Método no implementado, borrar esta parte cuando se haga';
        return false;  
    }

    public function deleteUserById(int $id_user): bool {
        echo 'Método no implementado, borrar esta parte cuando se haga';
        return false;  
    }

}
