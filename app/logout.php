<?php
/*
 * Logic
 */
 session_unset();
 session_destroy();
 
 header("Location: " . SITE_URL);
 exit;
