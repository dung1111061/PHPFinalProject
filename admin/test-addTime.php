<?php
// Datime class
echo "<pre>";
echo "\nmethod 1 \n";
$timestamp = new Datetime();
$timestamp->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));
echo $timestamp->format('d-m-Y H:i:s');
# 1582961480
# 
// date function
echo "\n\nmethod 2 \n";
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H:i:s');