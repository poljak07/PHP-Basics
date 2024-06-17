<?php

use Core\Authenticator;

(new Core\Authenticator)->logout();

header('location: /');
exit();