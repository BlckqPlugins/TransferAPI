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
     * @return void
     */
	public static function transferPlayer(Player $player, string $servername): void
    {
        $pk = new TransferPacket();
		$pk->address = $servername; //The server name you specified in the WaterDogPE config.
		$pk->port = 0;
		$player->getNetworkSession()->sendDataPacket($pk);
		Server::getInstance()->getLogger()->info($player->getName() . "§c will teleported to Server §f{$servername}§8.");
	}

}
