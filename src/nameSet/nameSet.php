<?php

namespace nameSet;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerPreLoginEvent;

use pocketmine\event\Listener;

use pocketmine\utils\Config;

use pocketmine\utils\TextFormat as Color;

class nameSet extends PluginBase implements Listener{
    
    public function onEnable(){
        
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder() . "languages/");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        $this->saveDefaultConfig();
        
        $this->config = new Config($this->getDataFolder() . "config.yml" , Config::YAML, Array(
        "lang.set" => "pt_br",
        ));
        $this->saveResource("config.yml");
        
        $this->getLogger()->info("SetName plugin!");
        
        $lang = $this->config->get("lang.set");
        
        
        $this->langconfig = new Config($this->getDataFolder() . "languages/" . $lang.".yml" , Config::YAML, Array(
        "changenick.message" => "§bVocê alterou seu nick para §a",
        ));
        
        $this->getLogger()->info("SetName plugin!");
        
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        $changeNickMessage = $this->langconfig->get("changenick.message");
        switch($command->getName()){
            case "setplayernick":
                if(isset($args[0])){
                      $sender->setDisplayName($args[0]);
                      $sender->sendMessage($changeNickMessage."".$args[0]);
                    }
        
                              
                    }
                    
                }
                     
        
        
        public function PlayerJoinEvent(PlayerJoinEvent $event){
            
            @mkdir($this->getDataFolder());
            @mkdir($this->getDataFolder() . "players/");
            
            $player = $event->getPlayer()->getName();
            $players = $this->getDataFolder() . "players/";
            
            $this->players = new Config($players . $player.".yml" , Config::YAML, Array(
            "Nick" => $player,
            ));
            
            
            $this->reloadConfig();
        
        }
    }
    