<?php
session_start();
// require_once this php before renderying any membership page. 
if (!isset($_SESSION['flag']) || ($_SESSION['flag'] == false))
{
  if (!$_GET['content_page'])
  {
    $full_name = $_SERVER['PHP_SELF'];
    $full_name = str_replace(".php","",$full_name);
    $full_name = str_replace("/xli2017s1_wad/PHPPractical/","",$full_name);
  }
  else
  {
    $full_name = $_GET['content_page'];
  }

  $_SESSION['request_page'] = $full_name;
  header("Location: index.php?content_page=Member&action=Login");
  exit;
}
?>