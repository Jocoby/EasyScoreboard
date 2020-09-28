<?php

/**
 * @author Jocoby
 * @link https://vk.com/id230613772
 */

namespace Jocoby\Scoreboard;

use pocketmine\Player;
use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;

/**
 * Class Scoreboard
 * @package Jocoby\Scoreboard
 */
class Scoreboard{

    /**
     * @var array[]
     */
    public $scoreboards = [];

    /**
     * @param Player $player
     * @param string $displayName
     */
    public function addScoreboard(Player $player, string $displayName): void{
        $this->remScoreboard($player);

        $packet = new SetDisplayObjectivePacket();
        $packet->displaySlot = "sidebar";
        $packet->objectiveName = $player->getName();
        $packet->displayName = $displayName;
        $packet->criteriaName = "dummy";
        $packet->sortOrder = 0;
        $player->sendDataPacket($packet);

        $this->scoreboards[$player->getName()] = $player->getName();
    }
    
    /**
     * @param Player $player
     */
    public function remScoreboard(Player $player): void{
        $packet = new RemoveObjectivePacket();
        $packet->objectiveName = $player->getName();
        $player->sendDataPacket($packet);

        unset($this->scoreboards[$player->getName()]);
    }

    /**
     * @param Player $player
     * @param int $score
     * @param string $message
     */
    public function setLine(Player $player, int $score, string $message): void{
        $entry = new ScorePacketEntry();
        $entry->objectiveName = $player->getName();
        $entry->type = $entry::TYPE_FAKE_PLAYER;
        $entry->customName = $message;
        $entry->score = $score;
        $entry->scoreboardId = $score;

        $packet = new SetScorePacket();
        $packet->type = $packet::TYPE_CHANGE;
        $packet->entries[] = $entry;
        $player->sendDataPacket($packet);
    }

}

?>
