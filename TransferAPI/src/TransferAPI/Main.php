<?php
/* Copyright (c) 2021 Florian H. All rights reserved. */

namespace TransferAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use TransferAPI\Commands\SendToCommand;

/**
 * Class Main
 * @package TransferAPI
 * @author Florian H.
 * @date 31.01.2021 - 21:50
 * @project TransferAPI
 */
class Main extends PluginBase {
	/**
	 * Function onEnable
	 * @return void
	 */
	public function onEnable():void
    {
		Server::getInstance()->getCommandMap()->register("sendto", new SendToCommand());
	}
}