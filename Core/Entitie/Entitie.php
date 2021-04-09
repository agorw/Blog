<?php

namespace Core\Entitie;

class Entitie
{

    public function __get(string $key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
