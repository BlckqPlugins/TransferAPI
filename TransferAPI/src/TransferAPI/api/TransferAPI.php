<?php
/* Copyright (c) 2021 Florian H. All rights reserved. */

namespace TransferAPI\api;

use pocketmine\network\mcpe\protocol\TransferPacket;
use pocketmine\Player;
use pocketmine\Server;


/**
 * Class TransferAPI
 * @package TransferAPI\api
 * @author Florian H.
 * @date 31.01.2021 - 21:49
 * @project TransferAPI
 */
class TransferAPI {

    /**
     * Function transferPlayer
     * @param Player $player
     * @param string $servername
     * @return void
     */
	public static function transferPlayer(Player $player, string $servername){

		if (is_null($servername) or !is_string($servername)){
			Server::getInstance()->getLogger()->alert("§4Please insert an valid Server name.");
			return;
		}

		$pk = new TransferPacket();
		$pk->address = $servername; //The server name you specified in the WaterDogPE config.
		$pk->port = 0;
		$player->sendDataPacket($pk);
		Server::getInstance()->getLogger()->info($player->getName() . "§c will teleported to Server §f{$servername}§8.");
	}

}
