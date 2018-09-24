<?php
if(file_exists(substr($_SERVER['SCRIPT_NAME'],1))){
  return false;
}
else {
  include 'index.php';
}
