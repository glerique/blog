<?php
require('includes/header.php');

require('autoload.php');

\models\Router::invoke();

require('includes/footer.php');