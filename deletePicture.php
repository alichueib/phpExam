<?php
unlink('images/'. $_GET['pid'] .'.jpg');
header('refresh:3,url='.$_SERVER['HTTP_REFERER']);
die("The pic is deleted Successfully");