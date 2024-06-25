<?php

class Session {
    const NOMEDASESSAO = 'eventhub';

    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        self::start();
        session_destroy();
    }

    public static function getIdUser() {
        self::start();
        return $_SESSION[self::NOMEDASESSAO]['idUsuario'] ?? null;
    }

    public static function getProfileUser() {
        self::start();
        return $_SESSION[self::NOMEDASESSAO]['perfil'] ?? null;
    }    

    public static function isSessionActive() {
        self::start();
        return isset($_SESSION[self::NOMEDASESSAO]) && $_SESSION[self::NOMEDASESSAO]['idUsuario'] > 0;
    }
}


?>