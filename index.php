<?php
$db = parse_url(getenv("DATABASE_URL"));
try{
$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    "ec2-176-34-237-141.eu-west-1.compute.amazonaws.com",
    "5432",
    "jljbzxjcxicvvn",
    "f608bcd12574fc48e322dcc08ca5dc6829404f3cb598eb36812439392ad2b4d7",
    "d1b4oe0cmou81i"
));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmnt = $pdo->prepare("SELECT * FROM public.car");
$stmnt->execute();
foreach(new TableRows(new RecursiveArrayIterator($stmnt->fetchAll())) as $k=>$v) {
    echo $v;
  }
}catch(PDOException $e){
	echo "Error:".$e.getMessage();
}

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}



?>