<?php
require_once __DIR__ . '/config/auth.php';
if (is_logged_in()) redirect('/area-aluno/dashboard/');
redirect('/area-aluno/login.php');
