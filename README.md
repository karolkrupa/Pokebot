# TeamSpeak3 PHP simple PokeBot
PokeBot who will be send poke to admin when someone join to selected channel

# Usage

To run script you must type `./bot.sh` in your console

# Configuration

To configure script you must edit `config.php` file

``` php
$config['Admin_offline'] // Message which will be send to user when administrator is offline
$config['Admin_online'] // Message which will be send to user when administrator is online
$config['poke_message'] // Message which will be send to admin when someone joint to selected channel

$config['time'] = 300; // Time betwen admin notifications
$config['time_offline'] = 10; // Time betwen admin notifications when last user leave selected channel (timeout)

$config['ip'] = 'localhost'; // IP adress from TS3 Instance
$config['query_port'] = 10011; // Server query port from TS3 Instance
$config['login'] = 'serveradmin'; // Server query login to TS3 Instance
$config['password'] = 'Password'; // Server query password to TS3 Instance
$config['port'] = 9987; // Server query port from TS3 Instance

$config['name'] = 'PokeBot'; // PokeBot name
$config['channel_id'] = '208'; // Channel ID who will be checking 
$config['group'] = '10,20,300'; // Admin groups list eg. 1,2,...,13
```
