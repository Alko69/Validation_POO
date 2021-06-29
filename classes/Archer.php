<?php

class Archer extends Character
{
    private $arrowsLeft = 5;
    private $turnCount = 0;

    public function turn($target)
    {
        $attackChoice = rand(1,3);
        if($this->turnCount === 1){
            $target->sethealthPoints($this->damage*2);
            $status = "$this->name tire 2 flèche sur $target->name. Il lui reste $target->healthPoints points de vie";
            $this->turnCount = 0;
            $this->arrowsLeft -=2;
            return $status;
        } elseif ($this->arrowsLeft === 0){
            return $this->basicAttack($target);
        } else{
            return $this->bowAttack($target);
        }
    } 
   
    public function basicAttack($target)
    {
        $target->setHealthPoints($this->damage-5);
        $status = "$this->name attaque $target->name avec sa dague. Il lui reste $target->healthPoints points de vie";
        return $status;
    }



    public function bowAttack($target)
    {
        $techniqueOrNot= rand(1,3);
        if($techniqueOrNot <3 || $this->arrowsLeft === 1){
            $target->setHealthPoints($this->damage);
            $this->arrowsLeft -=1;
            $status = "$this->name décoche une flèche sur $target->name. Il lui reste $target->healthPoints points de vie";
        }else{
            $this->turnCount =1;
            $status = "$this->name se prépare a lancer une super attaque.";
        }
        return $status;
    }
}