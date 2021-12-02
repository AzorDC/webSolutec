<?php
    class UserSession {
        public function __construct()
        {
            session_start();
        }

        public function setCurrentUser($user) {
            $_SESSION['usuario'] = $user;
        }
        
        public function getCurrentUser(){
            return $_SESSION['usuario'];
        }

        public function closeSession(){
            session_unset();
            session_destroy();
        }
    }    
?>