<?php

class SystemComponent {

var $settings;

function getSettings() {

// Database variables
$settings['dbhost'] = 'localhost';
$settings['dbusername'] = 'web7';
//$settings['dbusername'] = 'root';
$settings['dbpassword'] = '';

return $settings;

}

}
?>
