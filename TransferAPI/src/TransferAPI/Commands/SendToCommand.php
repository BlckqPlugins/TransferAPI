<?php
/* Copyright (c) 2021 Florian H. All rights reserved. */

namespace TransferAPI\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use TransferAPI\api\TransferAPI;


/**
 * Class SendToCommand
 * @package TransferAPI\Commands
 * @author Florian H.
 * @date 31.01.2021 - 21:43
 * @project TransferAPI
 */
class SendToCommand extends Command {
	/**
	 * SendToCommand constructor.
	 */
	public function __construct(){
		parent::__construct("sendto", "SendTo Command", "/sendto <Player> <Server> <Port>", ["transferto"]);
		$this->setPermission("transferapi.sendto");
	}

	/**
	 * Function execute
	 * @param CommandSender $sender
	 * @param string $commandLabel
	 * @param array $args
	 * @return mixed|void
	 */
	public function execute(CommandSender $sender, string $commandLabel, array $args): bool{

		if (!$this->testPermission($sender)){
			$sender->sendMessage("§cYou don't have the permissions to execute this command.");
			return false;
		}

		if ($sender instanceof Player){

			$player = null;

			if (!isset($args[0])){
				$player = $sender;
			} else {
				$player = Server::getInstance()->getPlayerExact($args[0]);
			}

			if (!isset($args[1]) or !is_string($args[1])){
				$sender->sendMessage("§cPlease enter a valid server name.");
				return false;
			}

			if (!isset($args[2]) or !is_numeric($args[2])){
				$sender->sendMessage("§cPlease enter a valid port.");
				return false;
			}

			if ($player instanceof Player){
				TransferAPI::transferPlayer($player, $args[1], $args[2]);
			}
		}
		return false;
	}
}
