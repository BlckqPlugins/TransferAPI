# TransferAPI
TransferAPI for WaterdogPE. Written in PHP.

Commands:
  - /sendto <Servername> <Player>
  
Permissions:
  - transferapi.sendto

 # Usage(example)
 ```php
 (to transfer a player via plugin) 
 new \TransferAPI\api\TransferAPI::transferPlayer($player, "ServerName");
  
 or
  
 (to transfer a player via command)
 /sendto <Server-Name> <Player (Default your name)> 
