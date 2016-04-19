<?php

session_start();

if( $_SESSION['auth'] != 1 ) {
    require( 'login.php' );
}
else {
    require( 'login.php' );
}
?>