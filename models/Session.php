<?php

namespace models;

class Session
{
    
    public static function isConnected(): bool
    {
        return !empty($_SESSION['connected']);
    }
      
    public static function connect($user)
    {
        $_SESSION['connected'] = true;
        $_SESSION['user'] = $user;
            if($_SESSION['user']['userRole']=="Admin"){
            $_SESSION['admin'] = true;
            }
            $token =  md5(bin2hex(openssl_random_pseudo_bytes(6)));
            $_SESSION['token'] = $token;            
        
    }   

    public static function isAdmin(): bool
    {
        return !empty($_SESSION['admin']);
    }   


    public static function disconnect()
    {
        session_destroy();
    }

    public static function addFlash(string $type, string $message)
    {
        if (empty($_SESSION['messages'])) {
            $_SESSION['messages'] = [
                'error' => [],
                'success' => [],
            ];
        }
        $_SESSION['messages'][$type][] = $message;
    }

    
    public static function getFlashes(string $type): array
    {
        if (empty($_SESSION['messages'])) {
            return [];
        }

        $messages = $_SESSION['messages'][$type];

        $_SESSION['messages'][$type] = [];

        return $messages;
    }
    
    public static function showFlashes(string $type): bool
    {
        if (empty($_SESSION['messages'])) {
            return false;
        }

        return !empty($_SESSION['messages'][$type]);
    }
}
