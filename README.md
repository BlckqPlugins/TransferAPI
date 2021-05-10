# TransferAPI
TransferAPI for WaterdogPE. Written in PHP. ( **NOT TESTED** )
This Plugin is only for PM3.

Commands:
  - /sendto <Player> <Servername> <Server-Port>

 # Usage(example)
 ```php
 $api = new \TransferAPI\api\TransferAPI();
 $api::transferPlayer($player, "ServerName", 19132);
