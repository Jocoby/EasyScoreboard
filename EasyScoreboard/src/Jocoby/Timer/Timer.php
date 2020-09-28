<?php

/**
 * @author Jocoby
 * @link https://vk.com/id230613772
 */

namespace Jocoby\Timer;

use pocketmine\scheduler\Task;

use Jocoby\Scoreboard\Scoreboard;
use Jocoby\Main;

/**
 * Class Timer
 * @package Jocoby\Timer
 */
class Timer extends Task{

    /**
     * @param Main $plugin
     */
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick): void{
        foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
            $board = new Scoreboard($this->plugin);
            $board->addScoreboard($player, "Test");
            $infos = [
                1 => ["player" => $player, "msg" => "Test line 1", "line" => 1],
                2 => ["player" => $player, "msg" => "Test line 2", "line" => 2],
                3 => ["player" => $player, "msg" => "Test line 3", "line" => 3],
                4 => ["player" => $player, "msg" => "Test line 4", "line" => 4],
                5 => ["player" => $player, "msg" => "Test line 5", "line" => 5],
                6 => ["player" => $player, "msg" => "Test line 6", "line" => 6],
                7 => ["player" => $player, "msg" => "Test line 7", "line" => 7],
                8 => ["player" => $player, "msg" => "Test line 8", "line" => 8],
                9 => ["player" => $player, "msg" => "Test line 9", "line" => 9],
                10 => ["player" => $player, "msg" => "Test line 10", "line" => 10],
                11 => ["player" => $player, "msg" => "Test line 11", "line" => 11],
                12 => ["player" => $player, "msg" => "Test line 12", "line" => 12],
                13 => ["player" => $player, "msg" => "Test line 13", "line" => 13],
                14 => ["player" => $player, "msg" => "Test line 14", "line" => 14],
                15 => ["player" => $player, "msg" => "Test line 15", "line" => 15]
            ];

            foreach($infos as $info){
                $board->setLine($info["player"], $info["line"], $info["msg"]);
            }
        }
    }

}

?>
