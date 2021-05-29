<?php

namespace Ana\Modulos\Web;

use Ana\Modulos\Database\DatabaseConfig;
use Ana\Modulos\Database;

trait appInit
{
    public function initApp(): void
    {
        DatabaseConfig::init();
        Database::init();
    }
}
