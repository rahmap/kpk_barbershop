<?php
session_start();
if (isset($_SESSION['nama'])) {
    echo 'aktif';
} else if (isset($_COOKIE['nama'])) {
	echo 'aktif';
}