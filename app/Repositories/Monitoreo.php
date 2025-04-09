<?php

namespace App\Repositories;


Class Monitoreo extends Guzzle
{
    public function all()
    {
       return $this->get('SixmabEternity001');
    }
}