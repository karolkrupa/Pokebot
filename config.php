<?php
#Wiadomości
$config['Admin_offline'] = 'Aktualnie nie ma żadnego administratora na serwerze'; #Wiadomość jeżeli nie ma żadnego administratora na serwerze
$config['Admin_online'] = 'Administrator został powiadomiony'; #Wiadomość jeżeli jest chociaż jeden administrator na serwerze
$config['poke_message'] = 'Ktoś potrzebuje twojej pomocy!'; #Wiadomość powiadomienia administratora

#Konfiguracja czasów powiadomień
$config['time'] = 300; #Czas odstępu między kolejnymi powiadomieniami administratora(Poke) wyrażony w sekundach
$config['time_offline'] = 10; #Czas odsepu międy następnymi powiadomieniami administratora(Poke) jeżeli wszyscy użytkownicy opuścili kanał pomocy wyrażony w sekundach

#Konfiguracja połączenia
$config['ip'] = 'localhost'; #IP serwera ts3
$config['query_port'] = 10011; #Port Query serwera ts3
$config['login'] = 'serveradmin'; #Login administratora serwera ts3
$config['password'] = 'Password'; #Hasło administratora serwera ts3
$config['port'] = 9987; #Port serwera ts3

#Konfiguracja bota
$config['name'] = 'PokeBot'; #Nazwa bot
$config['channel_id'] = '208'; #Id kanału pomocy
$config['group'] = '10,20,300'; #Id grup administracyjnych. Format: $config['group'] = 'id_grupy,id_grupy,...'
?>