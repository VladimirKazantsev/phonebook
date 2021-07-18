<?php
###########################################################
# LDAP переменные                                         #
###########################################################
$srv ="192.168.0.222"; 
$srv_domain ="elztg.local";
$srv_login ="kazantsev.vs@".$srv_domain; 
$srv_password = "Jpthj_40";

$ldapuri = "ldap://192.168.0.222:389";  // ldap-uri

###########################################################
# Соединение с LDAP                                       #
###########################################################
$ds= ldap_connect($ldapuri)
          or die("LDAP-URI некорректен");
//echo "Результат подключения: " . $ds . "<br />";

###########################################################
# Привязка                                                #
###########################################################
// if ($ds) {

    // привязка к ldap-серверу
    $ldapbind = ldap_bind($ds, $srv_login, $srv_password);

    // проверка привязки
//     if ($ldapbind) {
//         echo "LDAP-привязка успешна...";
//     } else {
//         echo "LDAP-привязка не удалась...";
//     }
// }

###########################################################
# Поиск данных в каталоге AD                              #
###########################################################
$dn= "OU=ОИТ,OU=elztg_users,DC=elztg,DC=local";
//*$sr= ldap_search($ds, $dn, $filter) or die ("Ошибка в поисковом запросе: ".ldap_error($ds));*/
//$dn = "OU=elztg_users,DC=elztg,DC=local";
$filter = "department=Отдел информационных технологий";
$filterconvert = mb_convert_encoding($filter, "CP1251", "UTF-8");
//"(&(objectClass=user)(objectCategory=person)(!(userAccountControl:1.2.840.113556.1.4.803:=2)))
// (|(sn=$person*)(givenname=$person*))";

//$justthese = array("ou", "sn", "givenOU=doprizivnikov,name", "mail");

$dnconvert = mb_convert_encoding($dn, "CP1251", "UTF-8");

$sr=ldap_search($ds, $dnconvert, $filterconvert);

$info = ldap_get_entries($ds, $sr);

$convert = mb_convert_encoding($info, "UTF-8", "CP1251");

//echo $convert["count"]." записей возвращено\n";
###########################################################
#         Служба охраны труда                             #
###########################################################
$dnSot= "OU=СОТ,OU=elztg_users,DC=elztg,DC=local";
$filterSot = "department=Служба охраны труда";
$filterSotconvert = mb_convert_encoding($filterSot, "CP1251", "UTF-8");
$dnSotconvert = mb_convert_encoding($dnSot, "CP1251", "UTF-8");
$srSot=ldap_search($ds, $dnSotconvert, $filterSotconvert);
$infoSot = ldap_get_entries($ds, $srSot);
$convertSot = mb_convert_encoding($infoSot, "UTF-8", "CP1251");

//echo "<h1>Показать все данные</h1><pre>";
//           print_r($convert);   
//           echo "</pre>";

//echo "<br />".$convert[5]["cn"][0];
//echo "<br />".$convert[5]["department"][0];

// echo '<h1>Показать моих пользователей</h1>';
        // for ($i=0; $i<$convert["count"]; $i++) {
        //     //echo "dn is: ". $data[$i]["dn"] ."<br />";
        //     echo "<b>Пользователь: </b>". $convert[$i]["cn"][0] ."  ";
        //     if(isset($convert[$i]["mail"][0])) {
        //         echo "<b>Email: </b>". $convert[$i]["mail"][0] ." ";
        //     } else {
        //         echo "<b>Email:</b> None ";
        //     }
        //     if(isset($convert[$i]["telephonenumber"][0])) {
        //         echo "<b>Номер телефона: </b>". $convert[$i]["telephonenumber"][0] ." ";
        //     } else {
        //         echo "<b>Номер телефона:</b> None";
        //     }
        //     if(isset($convert[$i]["department"][0])) {
        //         echo "<b>Отдел: </b>". $convert[$i]["department"][0] ." ";
        //     } else {
        //         echo "<b>Отдел:</b> None";
        //     }
        //     if(isset($convert[$i]["description"][0])) {
        //         echo "<b>Должность: </b>". $convert[$i]["description"][0] ."<br /><br />";
        //     } else {
        //         echo "<b>Должность:</b> None<br /><br />";
        //     }
        // }


ldap_close($ds);
?> 
