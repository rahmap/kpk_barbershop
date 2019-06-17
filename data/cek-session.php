<?php
session_start();
if (isset($_SESSION['nama'])) {
    echo $_SESSION['level'];
} else if (isset($_COOKIE['nama'])) {
	echo $_COOKIE['level'];
}