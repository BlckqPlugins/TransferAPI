<?php
/* Copyright (c) 2021 Florian H. All rights reserved. */

namespace TransferAPI\api;

use pocketmine\network\mcpe\protocol\TransferPacket;
use pocketmine\player\Player;
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
	 * @param int $port
	 * @return void
	 */
	public static function transferPlayer(Player $player, string $servername, int $port=1){

		if (is_null($servername) or !is_string($servername)){
			Server::getInstance()->getLogger()->alert("§4Please insert an valid Server name.");
			return;
		}

		if (is_null($port) or !is_numeric($port)){
			Server::getInstance()->getLogger()->alert("§4Please insert an valid Port.");
			return;
		}

		$pk = new TransferPacket();
		$pk->address = $servername; //The server name you specified in the WaterDogPE config.
		$pk->port = $port; //The server port you specified in the WaterDogPE config.
		$player->getNetworkSession()->sendDataPacket($pk);
		Server::getInstance()->getLogger()->info($player->getName() . "§c will teleported to Server §f{$servername} §c with Port §f{$port}§8.");
	}

}
