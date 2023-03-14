<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelBackup
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */

class AAPanelBackup extends AAPanelConnect
{
    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description List Backup
     * @param int $limit
     * @param $search
     * @return mixed
     */
    public function List(int $limit = 100, $search = null): mixed
    {
        $url = $this->serverUrl .'/data?action=getData&table=backup';
        
        $this->data['limit']   = $limit;
        $this->data['type']    = 0;
        $this->data['search']  = $search;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Create Backup
     * @param $id
     * @return mixed
     */
    public function Create($id): mixed
    {
        $url = $this->serverUrl .'/site?action=ToBackup';
        
        $this->data['id']   = $id;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Delete Backup
     * @param $id
     * @return mixed
     */
    public function Delete($id): mixed
    {
        $url = $this->serverUrl .'/site?action=DelBackup';
        
        $this->data['id']   = $id;
        return (parent::Execute($url,$this->data));
    }
}