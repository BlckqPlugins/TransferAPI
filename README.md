# TransferAPI
TransferAPI for WaterdogPE. Written in PHP. ( **NOT TESTED** )
This Plugin is only for PM4. <a href="https://github.com/BlckqPlugins/TransferAPI/tree/PM3">PM3 Support</a>

Commands:
  - /sendto <Player> <Servername> <Server-Port>

 # Usage(example)
 ```php
 $api = new \TransferAPI\api\TransferAPI();
 $api::transferPlayer($player, "ServerName");
  
 or
  
 /sendto <Player (Default your name)> <Server-Name> 
