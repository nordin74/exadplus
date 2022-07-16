<?php

namespace Exads;

$config = require_once 'DBConfig.php';

return new \PDO($config['dsn'], $config['user'], $config['pass']);

