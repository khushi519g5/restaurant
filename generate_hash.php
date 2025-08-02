<?php
$password = 'admin123';
echo 'Hash for "admin123":<br>';
echo password_hash($password, PASSWORD_DEFAULT);
