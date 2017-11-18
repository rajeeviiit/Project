<?php
$connect_error = 'sorry problems in connection';

mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('library') or die($connect_error);



	
