<?php
error_reporting(0);
# configuration for database
$_config['database']['hostname'] = "db";
$_config['database']['username'] = "myuser";
$_config['database']['password'] = "mypassword";
$_config['database']['database'] = "mydatabase";

# connect the database server
$link = new mysqldb();
$link->connect($_config['database']);
$link->selectdb($_config['database']['database']);
$link->query("SET NAMES 'utf8'");
date_default_timezone_set('Asia/Bangkok');

@session_start();
?>