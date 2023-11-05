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
                $msj = "Registro exitosa";
                header("refresh:0, url=login.php?msj=$msj");
            } else {

                $msj = "Error al insertar datos: ";
                header("refresh:0, url=register.php?msj=$msj");

            }
        }

        public function update($id_user, array $data) {
            $userRepository = new UserRepository();

            if ($userRepository->updateUserById($id_user ,$data)) {
                $user = $userRepository->getById($id_user);

                $_SESSION['user'] = serialize( $user );

                header("refresh:0, url=dashboard.php?=");
                
                
            }else{

                $msj = "Los datos no se pudieron actualizar";
                header("refresh:0, url=dashboard.php?msj=$msj");
            }

        }

        public function pic($id_user, array $data){
            $userRepository = new UserRepository();
            
            if ($userRepository->insertPic($id_user, $data)) {
                $user = $userRepository->getById($id_user);
                $_SESSION['user'] = serialize($user);
                header("Location: dashboard.php");
            } else {
                $msj = "Los datos no se pudieron actualizar";
                header("Location: dashboard.php?msj=$msj");
            }
        }

        public function cerrarSesion() {
            session_start();
            session_destroy();
            header("refresh:0, url=login.php");
        }
    }
?>