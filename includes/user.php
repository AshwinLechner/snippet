<?php

if (isset($_POST['logout'])) {
    session_unset();
}