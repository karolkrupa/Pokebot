<?php
require('ts3admin.class.php');
require('config.php');

$tsAdmin = new ts3admin($config['ip'], $config['query_port']);

if($tsAdmin->getElement('success', $tsAdmin->connect()))
{
	$tsAdmin->login($config['login'], $config['password']);
	
	$tsAdmin->selectServer($config['port']);
	
	$tsAdmin->setName($config['name']);
	
	$poketimer = date('r');

	#Pke function
	function poke()
	{
		global $config;
		global $tsAdmin;
		global $poketimer;

		#Zamiana listy grup na tablice 
		$groups = explode(',', $config['group']);
		
		#Sprawdzenie czy można już wysłać poke
		if(date('r') > $poketimer)
		{
			#Sprawdzanie każdej grupy
			foreach($groups as $temp_groups)
			{
				#Pobranie danych członków grupy
				$ids = $tsAdmin->serverGroupClientList($temp_groups, true);
				
				#Sprawdzenie każdego członka grupy
				foreach($ids['data'] as $ids_temp)
				{
					#Pobranie nicku oraz spradzenie dostępności użytkownika 
					$find = $tsAdmin->clientFind($ids_temp['client_nickname']);
	
					#Jeżeli znaleziono użytkownika
					if($find['success'] == true)
					{	
						foreach($find['data'] as $find_temp)
						{
							#Wysyłanie poke
							$tsAdmin->clientPoke($find_temp['clid'], $config['poke_message']);
							#Ustawienie czasu do następnego poke
							$poketimer = date('r', time() + $config['time']);
						}
					}
				}
				
			}
			
		}
	}
	
	$i = 0;
	
	$sended = array();
	
	$send = array();
	
	#Sprawdzanie czy ktoś jest na kanale
	while($i >= 0)
	{
		#Pobieranie listy użytkowników serwera
		$clientlList = $tsAdmin->clientList();
		
		#Przeszukiwanie wszystkich użytkowników
		foreach($clientlList['data'] as $temp)
		{
			#Wybór użytkowników obecnym na wybranym kanale
			if($temp['cid'] == $config['channel_id'])
			{
				#Przypisywanie id obecnych użytkowników na kanale do tablicy $send
				$send[$temp['clid']] = $temp['clid'];
				
				#Sprawdzanie kto nie dostał prywatnej wiadomości
				$diff = array_diff($send, $sended);
				
				poke();
				
				#Wysyłanie wiadomości wszystkim użytkownikom którzy dopiero weszli na kanał
				foreach($diff as $temp_diff)
				{
					#Wysyłanie wiadomości kiedy nie ma żadnego administratora
					#if($poke > 0)
					#{
						$tsAdmin->sendMessage(1,$temp_diff,$config['Admin_online']);
					#}
					#Wysyłanie wiadomości kiedy administrator jest online
					#else
					#{
					#	$tsAdmin->sendMessage(1,$temp_diff,$config['Admin_offline']);
					#}
				}
			}
		}
		
		#Czyszczenie tablicy użytkowników którzy dostali wiadomość
		$sended = array();
		
		#Przypisanie id użytkowników którzy dostali wiadomość do listy użytkowników która odebrała wiadomość
		foreach($send as $temp1_poke)
		{
			$sended[$temp1_poke] = $temp1_poke;
		}
		
		#Czyszczenie tablicy do których wiadomość zosała wysłana
		$send = array();
		
		sleep(1);
	}
}
?>