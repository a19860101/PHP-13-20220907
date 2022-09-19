<?php
// session server暫存
session_start();

$_SESSION['USER'] = 'MARY';

echo $_SESSION['USER'];