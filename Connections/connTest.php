<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connTest = "localhost";
$database_connTest = "mydb";
$username_connTest = "root";
$password_connTest = "";
$connTest = mysql_pconnect($hostname_connTest, $username_connTest, $password_connTest) or trigger_error(mysql_error(),E_USER_ERROR); 
?>