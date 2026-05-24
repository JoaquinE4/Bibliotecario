<?php

class SessionMiddleware
{

    public function run($req)
    {

        if (isset($_SESSION['id'])) {
            $req->user = new stdClass();
            $req->user->id = $_SESSION['id'];
            $req->user->email = $_SESSION['email'];
            $req->user->rol = $_SESSION['rol'];
            $req->user->nombre = $_SESSION['usuario'];
        } else {
            $req->user = null;
        }

        return $req;
    }
}