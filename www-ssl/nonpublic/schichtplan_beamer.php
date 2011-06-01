<?php
  include "../../../camp2011/includes/header_start.php";
  include "../../../camp2011/includes/funktionen.php";
  include "../../../camp2011/includes/funktion_schichtplan_beamer.php";

  $Time = time() + 3600 + 3600;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Schichtpl&auml;ne f&uuml;r Beamer</title>
<meta http-equiv="refresh" content="30; URL=<?php echo $url . $_SERVER['PHP_SELF']; ?>" />
</head>

<body>

<?php
  echo "<table border=\"1\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" frame=\"void\">\n";

echo "<colgroup span=\"4\" valign=\"center\">
  <col width=\"30\">
  <col width=\"3*\">
  <col width=\"3*\">
  <col width=\"3*\">
  </colgroup>\n";

echo "<tr align=\"center\">\n" . 
  "<td>". gmdate("d.m.y", $Time) ."</td>\n".
  "<td>". gmdate("H", $Time - 3600) . ":00</td>\n".
  "<td>". gmdate("H", $Time + 0) . ":00</td>\n".
  "<td>". gmdate("H", $Time + 3600) .":00</td>\n".
  "</tr>\n";

foreach($Room as $RoomEntry) {
  // var-init
  $AnzahlEintraege = 0;
  
  $Out = ausgabe_Zeile($RoomEntry["RID"], $Time - 3600, $AnzahlEintraege);
  $Out .= ausgabe_Zeile($RoomEntry["RID"], $Time, $AnzahlEintraege);
  $Out .= ausgabe_Zeile($RoomEntry["RID"], $Time + 3600, $AnzahlEintraege);

  if($AnzahlEintraege == 0)
    $Out = "";
  else
    $Out = "<tr>\n<td>_" . $RoomEntry["Name"] . "_</td>\n" . $Out . "</tr>\n";
  
  echo $Out;
}
?>

</table>

</body>
</html>
