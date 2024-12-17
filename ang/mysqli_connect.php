<?php
$dbcon = @mysqli_connect('localhost', 'vaughnang', 'vaughnang','members_ang')
OR die('Could not connect to my MySql, Error in  '. mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');

