<?php 
class SkadiParameters{
    function parametrize($event = array()){
        $create = false;
        if (!empty($event['create']) && empty($event['errors'])){
            $create = true;
            $entity = $event['create'];
        }
        
        if ($create){
            switch ($entity){
                case "types":
                    App::import('Model', 'Type');
                    $Type = new Type();
                    $types = array();
                    $types[] = array(
                        'type'=>'EMAIL',
                        'description'=>'Email access'
                    );
                    $types[] = array(
                        'type'=>'TWITTER',
                        'description'=>'Twitter access'
                    );
                    foreach($types as $type){
                        $Type->create();
                        $Type->save($type);
                    }
                break;
            }
        }
    }
}