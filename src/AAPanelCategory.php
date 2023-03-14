<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelCategory
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelCategory extends AAPanelConnect
{
    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @description List Category
     * @return mixed
     */
    public function List(): mixed
    {
        $url = $this->serverUrl .'/site?action=get_site_types';
        
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Create Category
     * @param string $name
     * @return mixed
     */
    public function Create(string $name): mixed
    {
        $url = $this->serverUrl .'/site?action=add_site_type';
        
        $this->data['name'] = $name;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Update Category
     * @param int $id
     * @param string $name
     * @return mixed
     */
    public function Update(int $id, string $name): mixed
    {
        $url = $this->serverUrl .'/site?action=modify_site_type_name';
        
        $this->data['id']   = $id;
        $this->data['name'] = $name;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Delete Category
     * @param int $id
     * @return mixed
     */
    public function Delete(int $id): mixed
    {
        $url = $this->serverUrl .'/site?action=remove_site_type';
        
        $this->data['id']   = $id;
        return (parent::Execute($url,$this->data));
    }
}