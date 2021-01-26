<?php

require __DIR__.'/../config.php';
unset($_SESSION);
Session::destroy();
