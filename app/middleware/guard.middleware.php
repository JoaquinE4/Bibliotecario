<?php
class GuardMiddleware
{
    public function run($req)
    {
        if (!$req->user || $req->user->rol !== 'admin') {
            header("Location: " . BASE_URL . "login");
            die();
        }

        return $req;
    }
}
