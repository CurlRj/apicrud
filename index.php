<?php
$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    "ec2-176-34-237-141.eu-west-1.compute.amazonaws.com",
    "5432",
    "jljbzxjcxicvvn",
    "f608bcd12574fc48e322dcc08ca5dc6829404f3cb598eb36812439392ad2b4d7",
    ltrim($db["path"], "/")
));
?>