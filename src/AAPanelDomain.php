<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelDomain
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */

class AAPanelDomain extends AAPanelConnect
{
    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description List Data Domain
     * @param $id
     * @return mixed
     */
    public function ListSite($id): mixed
    {
        $url = $this->serverUrl .'/data?action=getData&table=domain';
        
        $this->data['search']  = $id;
        $this->data['list']    =  true;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Add Domain
     * @param $id
     * @param $domain
     * @param $addDomain
     * @return mixed
     */
    public function Add($id, $domain, $addDomain): mixed
    {
        $url = $this->serverUrl .'/site?action=AddDomain';
        
        $this->data['id']       = $id;
        $this->data['webname']  = $domain;
        $this->data['domain']   = $addDomain;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Delete Domain
     * @param $id
     * @param $domain
     * @param $deleteDomain
     * @return mixed
     */
    public function Delete($id, $domain, $deleteDomain): mixed
    {
        $url = $this->serverUrl .'/site?action=DelDomain';
        
        $this->data['id']       = $id;
        $this->data['webname']  = $domain;
        $this->data['domain']   = $deleteDomain;
        $this->data['port']     = 80;
        return (parent::Execute($url,$this->data));
    }

    /**
     * @description Delete Multiple Domain
     * @param $id
     * @param $domainsId
     * @return mixed
     */
    public function DeleteMultiple($id, $domainsId): mixed
    {
        $url = $this->serverUrl .'/site?action=delete_domain_multiple';
        
        $this->data['id']          = $id;
        $this->data['domains_id']  = $domainsId;
        return (parent::Execute($url,$this->data));
    }
}