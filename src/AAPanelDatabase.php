<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelDatabase
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelDatabase extends AAPanelConnect
{
    /**
     * @description Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description Set Database Permissions
     * @param string $username
     * @param string $dataAccess
     * @param string $access
     * @param string|null $ssl
     * @return mixed
     */
    public function Permissions(string $username, string $dataAccess, string $access, ?string $ssl): mixed
    {
        $url = $this->serverUrl . '/database?action=SetDatabaseAccess';

        $this->data['name']       = $username;
        $this->data['dataAccess'] = $dataAccess;
        $this->data['access']     = $access;
        $this->data['ssl']        = $ssl;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Change Password
     * @param int $id
     * @param string $username
     * @param string $pwd
     * @return mixed
     */
    public function ChangePwd(int $id, string $username, string $pwd): mixed
    {
        $url = $this->serverUrl . '/database?action=ResDatabasePassword';

        $this->data['id']         = $id;
        $this->data['name']       = $username;
        $this->data['password']   = $pwd;
        return (parent::Execute($url, $this->data));
    }

    /** 
     * @description Database Check required fields
     * @param $sqlDataUser
     * @param $sqlDataPassword
     * @return bool
     */
    public function Verify(string $sqlDataUser, string $sqlDataPassword): bool
    {
        if (!empty($sqlDataUser) && !empty($sqlDataPassword)) {
            return true;
        }

        return false;
    }
}
