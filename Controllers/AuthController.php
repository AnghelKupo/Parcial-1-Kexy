<?php
        require_once '../Repositories/UserRepository.php';

    class AuthController {


        public function login($email, $pass) {
            
            $userRepository = new UserRepository();
            $user = $userRepository->getByEmailPass($email, $pass);

            if( !is_null($user)){
                session_start();
                $_SESSION['user'] = serialize( $user );
                header('refresh:0;url=dashboard.php');
                exit;

            }else{
                $msj = 'Correo o contraseña incorrectos';
                header("refresh:0, url=login.php?msj=$msj");
                exit;
            }

        }
        public function register(array $data) {
            $userRepository = new UserRepository();
            if ($userRepository->insertUser($data)) {
                $msj = "Insercion exitosa";
                header("refresh:0, url=login.php?msj=$msj");
            } else {

                $msj = "Error al insertar datos: ";
                header("refresh:0, url=register.php?msj=$msj");

            }
        }
    }

?>