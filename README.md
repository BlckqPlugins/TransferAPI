# TransferAPI
TransferAPI for WaterdogPE. Written in PHP. ( **NOT TESTED** )
This Plugin is only for PM3. <a href="https://github.com/BlckqPlugins/TransferAPI/tree/main">PM4 Support</a>

Commands:
  - /sendto <Player> <Servername> <Server-Port>

 # Usage(example)
 ```php
 (to transfer a player via plugin) 
 new \TransferAPI\api\TransferAPI::transferPlayer($player, "ServerName");
  
 or
  
 (to transfer a player via command)
 /sendto <Player (Default your name)> <Server-Name> 
