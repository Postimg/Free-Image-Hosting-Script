<?php
/*
 * Database Connection
 */
require_once 'ezSQL/shared/ez_sql_core.php';
require_once 'ezSQL/ez_sql_mysql.php';

$db = new ezSQL_mysql('', '', '', '');
$db->query("SET CHARSET utf8");
