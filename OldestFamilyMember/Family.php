<?php

class Family{
     private $members=[];

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }

     function addMember($member){
            array_push($this->members,$member);
     }
     function getOldestMember(){
         $oldestMember = current($this->members);
            foreach ($this->members as $member){
              if($oldestMember->getAge()<$member->getAge()){
                  $oldestMember=$member;
              }
            }
            return $oldestMember;
     }

}