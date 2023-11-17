<?php include "./cabecera.inc";
?>
<body>
<?php
setcookie('nombreusu',$_REQUEST['nombre'],time()+300);
setcookie('colorusu',$_REQUEST['color'],time()+300);

header("Location:Index.php?");
exit();
