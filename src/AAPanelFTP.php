<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelFTP
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelFTP extends AAPanelConnect
{

    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description FTP Account List
     * @param int $limit
     * @param string $orderBy
     * @return mixed
     */
    public function List(int $limit = 100, string $orderBy = 'name'): mixed
    {
        $url = $this->serverUrl . '/data?action=getData&table=ftps';

        $this->data['limit'] = $limit;
        $this->data['order'] = $orderBy;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description FTP Account Create
     * @param $ftpUsername
     * @param $ftpPassword
     * @param string $path
     * @param $description
     * @return mixed
     */
    public function Create($ftpUsername, $ftpPassword, $description, string $path = '/www/wwwroot/'): mixed
    {
        $url = $this->serverUrl . '/ftp?action=AddUser';

        $this->data['ftp_username'] = $ftpUsername;
        $this->data['ftp_password'] = $ftpPassword;
        $this->data['ps']           = $description;
        $this->data['path']         = $path;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description FTP Account Delete
     * @param $id
     * @param $ftpUsername
     * @return mixed
     */
    public function Delete($id, $ftpUsername): mixed
    {
        $url = $this->serverUrl . '/ftp?action=DeleteUser';

        $this->data['id']       = $id;
        $this->data['username'] = $ftpUsername;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description FTP Account Change Pwd
     * @param $id
     * @param $ftpUsername
     * @param $newPwd
     * @return mixed
     */
    public function ChangePwd($id, $ftpUsername, $newPwd): mixed
    {
        $url = $this->serverUrl . '/ftp?action=SetUserPassword';

        $this->data['id']           = $id;
        $this->data['ftp_username'] = $ftpUsername;
        $this->data['new_password'] = $newPwd;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description FTP Account Change Status
     * @param $id
     * @param $ftpUsername
     * @param $actualStatus
     * @return mixed
     */
    public function ChangeStatus(int $id, string $ftpUsername, $actualStatus): mixed
    {
        $url = $this->serverUrl . '/ftp?action=SetStatus';

        $this->data['id']           = $id;
        $this->data['username']     = $ftpUsername;
        $this->data['status']       = $actualStatus == 0 ? '1' : '0';
        return (parent::Execute($url, $this->data));
    }

    /** 
     * @description FTP Check required fields
     * @param $ftpUsername
     * @param $ftpPassword
     * @return bool
     */
    public function Verify(string $ftpUsername, string $ftpPassword): bool
    {
        if (!empty($ftpUsername) && !empty($ftpPassword)) {
            return true;
        }

       return false;
    }
}
