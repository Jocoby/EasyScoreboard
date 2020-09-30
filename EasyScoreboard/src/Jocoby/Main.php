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

    public function onEnable(): void{
        $this->getScheduler()->scheduleRepeatingTask(new Timer($this), 20 * 5);
    }

}

?>
