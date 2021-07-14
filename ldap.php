<?php
###########################################################
# LDAP переменные                                         #
###########################################################
$srv ="172.16.0.2"; 
$srv_domain ="dom.local";
$srv_login ="admin@".$srv_domain; 
$srv_password = "123";

$ldapuri = "ldap://172.16.0.2:389";  // ldap-uri

###########################################################
# Соединение с LDAP                                       #
###########################################################
$ds= ldap_connect($ldapuri)
          or die("LDAP-URI некорректен");
echo "Результат подключения: " . $ds . "<br />";

###########################################################
# Привязка                                                #
###########################################################
if ($ds) {

    // привязка к ldap-серверу
    $ldapbind = ldap_bind($ds, $srv_login, $srv_password);

    // проверка привязки
    if ($ldapbind) {
        echo "LDAP-привязка успешна...";
    } else {
        echo "LDAP-привязка не удалась...";
    }
}

###########################################################
# Поиск данных в каталоге AD                              #
###########################################################
$dn= "OU=doprizivnikov,DC=dom,DC=local";
/*$sr= ldap_search($ds, $dn, $filter) or die ("Ошибка в поисковом запросе: ".ldap_error($ds));*/

//$dn = "OU=elztg_users,DC=elztg,DC=local";
//$filter = "(|(sn=$person*)(givenname=$person*))";
//$justthese = array("ou", "sn", "givenOU=doprizivnikov,name", "mail");

$sr=ldap_search($ds, $dn, "(cn=*)");

$info = ldap_get_entries($ds, $sr);

$convert = mb_convert_encoding($info, "UTF-8", "CP1251");

echo $convert["count"]." записей возвращено\n";

// echo '<h1>Показать все данные</h1><pre>';
//           print_r($convert);   
//           echo '</pre>';

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
?> description