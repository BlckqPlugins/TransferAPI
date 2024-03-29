<?php
/* Copyright (c) 2021 Florian H. All rights reserved. */

namespace TransferAPI\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\player\Player;
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
		parent::__construct("sendto", "SendTo Command", "/sendto <Server-Name> <Player (default: Your Playername)>", ["transferto", "connectto"]);
		$this->setPermission("transferapi.sendto");
	}

    /**
     * Function execute
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return bool
     */
	public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {

        if (!$this->testPermission($sender)) {
            $sender->sendMessage("§cYou don't have the permissions to execute this command.");
            return false;
        }

        if (!isset($args[0]) or !is_string($args[0])) {
            $sender->sendMessage($this->getUsage());
            return false;
        }

        if ($sender instanceof ConsoleCommandSender){
            if (!isset($args[1])){
                $sender->sendMessage("§cYou must specify a player name.");
                return false;
            }
        }

        if (!isset($args[1])) {
            $player = $sender->getName();
        } else {
            $player = $args[1];
        }

        $transferPlayer = Server::getInstance()->getPlayerExact($player);
        if ($transferPlayer instanceof Player) {
            TransferAPI::transferPlayer($transferPlayer, $args[0]);
        } else {
            $sender->sendMessage("§cThe player §e{$player} is not online.");
        }
        return false;
    }
}
