<?php
session_start();
session_destroy();
echo '<p>You will be redirected to the <b>Planets Page</b><p>';
header("refresh:1,url=".$_SERVER['HTTP_REFERER']);