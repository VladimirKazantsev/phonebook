<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Телефонный справочник</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/apple-touch-icon.png">
	</head>
<body>
	<header>
		<div>
			<img src="img/logo.png" width="450px" height="120">
		</div>		
	</header>
	<article>
		<br>
		<div>
<h1 id="textTelSpr">Телефонный справочник АО "ЕлецГидроАгрегат"</h1>
<br><br>
<marquee scrolldelay="200" bgcolor="#ffcc00" height="60"><h2 id="attention">ВНИМАНИЕ! При обнаружении неточности в телефонном справочнике просьба сообщить в отдел информационных технологий</h2></marquee>
		</div>
		<div class="tablediv">
		<table>
			
			<tr>
	<th>№п/п</th>
	<th>Должность/Объект</th>
	<th>ФИО</th>
	<th>Телефон</th>
	<th>Мобильный</th>
			</tr>
			
			<tr>
	<td class="departament" colspan="5"><h3>Отдел иннформационных технологий</h3></td>
			</tr>

<?php
// require_once('connect_db.php');
// mysqli_query($link, 'SET NAMES utf8');
// $res= mysqli_query($link, "SELECT * FROM personal");
// while ($pole= mysqli_fetch_assoc($res)) {
// 		echo "<tr class=\"trcolor\">"."<td>".$pole['nomer']."</td>"."<td>".$pole['position']."</td>"."<td>".$pole['fullname']."</td>"."<td>".$pole['phone']."</td>"."<td>".$pole['mobile']."</td>"."</tr>";
// }
require_once('ldap.php');

for ($j=0; $j<$convert["count"]; $j++){
	//$oit = "Отдел информационных технологий";
	if((isset($convert[$j]["department"][0]))) /*&& ($convert[$j]["department"][0] == $oit))*/{	

            $numpp = $j+1; 	
            echo "<tr class=\"trcolor\">"."<td>".$numpp."</td>";

            if(isset($convert[$j]["description"][0])) {
                echo "<td>".$convert[$j]["description"][0]."</td>"; //Должность
            } else {
                echo "<td>None</td>";
            }

            echo "<td>".$convert[$j]["cn"][0]."</td>"; //ФИО

            // if(isset($convert[$j]["mail"][0])) {
            //     echo "<b>Email: </b>". $convert[$j]["mail"][0] ." ";
            // } else {
            //     echo "<b>Email:</b> None ";
            // }
            if(isset($convert[$j]["telephonenumber"][0])) {
                echo "<td>".$convert[$j]["telephonenumber"][0] ."</td>";
            } else {
                echo "<td>None</td>";
            }
            // if(isset($convert[$j]["department"][0])) {
            //     echo "<b>Отдел: </b>". $convert[$j]["department"][0] ." ";
            // } else {
            //     echo "<b>Отдел:</b> None";
            // }
            if(isset($convert[$j]["mobile"][0])) {
                echo "<td>".$convert[$j]["mobile"][0] ."</td>"."</tr>";
            } else {
                echo "<td>None</td></tr>";
            }            
    }
}

// for ($j=0; $j<$convert["count"]; $j++){
// 	$oit = "ОИТ";
// 	echo "$convert[$j][\"departament\"][0]";
// 	if($convert[$j]["departament"][0]==$oit){
// for ($i=0; $i<$convert["count"]; $i++) {
//              $numpp=$i+1; 	
//             echo "<tr class=\"trcolor\">"."<td>".$numpp."</td>";

//             if(isset($convert[$i]["description"][0])) {
//                 echo "<td>".$convert[$i]["description"][0]."</td>"; //Должность
//             } else {
//                 echo "<td>None</td>";
//             }

//             echo "<td>".$convert[$i]["cn"][0]."</td>"; //ФИО

//             // if(isset($convert[$i]["mail"][0])) {
//             //     echo "<b>Email: </b>". $convert[$i]["mail"][0] ." ";
//             // } else {
//             //     echo "<b>Email:</b> None ";
//             // }
//             if(isset($convert[$i]["telephonenumber"][0])) {
//                 echo "<td>".$convert[$i]["telephonenumber"][0] ."</td>";
//             } else {
//                 echo "<td>None</td>";
//             }
//             // if(isset($convert[$i]["department"][0])) {
//             //     echo "<b>Отдел: </b>". $convert[$i]["department"][0] ." ";
//             // } else {
//             //     echo "<b>Отдел:</b> None";
//             // }
//             if(isset($convert[$i]["mobile"][0])) {
//                 echo "<td>".$convert[$i]["mobile"][0] ."</td>"."</tr>";
//             } else {
//                 echo "<td>None</td></tr>";
//             }            
//         }
//     }
// }
?>	
            <tr>
	<td class="departament" colspan="5"><h3>Служба охраны труда</h3></td>
			</tr>
<?php

for ($j=0; $j<$convertSot["count"]; $j++){
	if((isset($convertSot[$j]["department"][0]))){	

            $numpp = $j+1; 	
            echo "<tr class=\"trcolor\">"."<td>".$numpp."</td>";

            if(isset($convertSot[$j]["description"][0])) {
                echo "<td>".$convertSot[$j]["description"][0]."</td>"; //Должность
            } else {
                echo "<td>None</td>";
            }

            echo "<td>".$convertSot[$j]["cn"][0]."</td>"; //ФИО

           if(isset($convertSot[$j]["telephonenumber"][0])) {
                echo "<td>".$convertSot[$j]["telephonenumber"][0] ."</td>";
            } else {
                echo "<td>None</td>";
            }
            
           if(isset($convertSot[$j]["mobile"][0])) {
                echo "<td>".$convertSot[$j]["mobile"][0] ."</td>"."</tr>";
            } else {
                echo "<td>None</td></tr>";
            }            
    }
}
?>			





			<tr> 
	<td class="departament" colspan="5"><h3>Отдел управления персоналом</h3></td>
			</tr>

			<tr class="trcolor">
	<td title="Номер по порядку">1</td>
	<td>Специалист</td>
	<td>Крамцова Ирина Викторовна</td>
	<td>71-1-23</td>
	<td>8(910)234-47-17</td>
			</tr>
		</table>
	</div>
	
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p class="k1">Эксперимент</p><br><br><br><br><br><br>	<pre>Тег   учитывает    пробелы</pre>
	</article>
	<footer>
		Подвал mysite
	</footer>
</body>
</html>
