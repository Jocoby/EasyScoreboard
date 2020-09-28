<?php

/**
 * @author Jocoby
 * @link https://vk.com/id230613772
 */

namespace Jocoby;

use pocketmine\plugin\PluginBase;

use Jocoby\Timer\Timer;

/**
 * Class Main
 * @package Jocoby
 */
class Main extends PluginBase{

    public function onLoad(): void{
        $this->getLogger()->info("Загрузка...");
    }

    public function onEnable(): void{
        $this->getScheduler()->scheduleRepeatingTask(new Timer($this), 20);
        $this->getLogger()->info("Успешно!");
    }

    public function onDisable(): void{
        $this->getLogger()->info("Выключение...");
    }

}

?>
