<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelSite
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */

class AAPanelSite extends AAPanelConnect
{

    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @description List Site
     * @param int $type
     * @param int $limit
     * @param string $orderBy
     * 
     */
    public function List(int $type = -1, int $limit = 100, string $orderBy = 'id')
    {
        $url = $this->serverUrl . '/data?action=getData&table=sites';

        $this->data['type']  = $type;
        $this->data['limit'] = $limit;
        $this->data['order'] = $orderBy;

        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Site Stop
     * @param $id
     * @param $domain
     * @return mixed
     */
    public function Stop($id, $domain): mixed
    {
        $url = $this->serverUrl . '/site?action=SiteStop';

        $this->data['id']   = $id;
        $this->data['name'] = $domain;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Site Start
     * @param $id
     * @param $domain
     * @return mixed
     */
    public function Start($id, $domain): mixed
    {
        $url = $this->serverUrl . '/site?action=SiteStart';

        $this->data['id']   = $id;
        $this->data['name'] = $domain;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Site Size
     * @param string $path
     * @return mixed
     */
    public function Size(string $domain, string $path = '/www/wwwroot/'): mixed
    {
        $url = $this->serverUrl . '/files?action=GetDirSize';

        $this->data['path']   = $path . $domain;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Create Account Server
     * @param string $domain     -- Domain Account Create
     * @param $typeId            -- Account Category
     * @param string $type       -- Language Type
     * @param int $version       -- Language Version
     * @param int $port          -- Port
     * @param $description       -- Account Description
     * @param bool $ftp          -- Create FTP Account
     * @param bool $sql          -- Create SQL Account
     * @param bool $ssl          -- Enable Certificate SSL
     * @param bool $https        -- Force Https use
     * @param array $domainList  -- Domain Add
     * @param $path              -- Dir Path
     * @return bool|string
     */
    public function Create(
        string $domain,
        int    $typeId,
        bool   $ftp = false,
        $sql,
        bool   $ssl = true,
        bool   $https = true,
        array  $domainList = [],
        string $path = null,
        string $type = 'PHP',
        int $version = 81,
        int $port = 80,
        string $description = null,
        string $sqlDataUser = null,
        string $sqlDataPassword = null,
        string $ftpUsername = null,
        string $ftpPassword = null,
    ) {
        $url = $this->serverUrl . '/site?action=AddSite';
        $path = !empty($path) ? $path : $domain;

        $this->data['webname']   = json_encode(array("domain" => $domain, "domainlist" => $domainList, "count" => 0));
        $this->data['path']      = '/www/wwwroot/' . $path;
        $this->data['type_id']   = $typeId;
        $this->data['type']      = $type;
        $this->data['version']   = $version;
        $this->data['port']      = $port;
        $this->data['ps']        = $description;
        $this->data['ftp']       = $ftp;
        $this->data['sql']       = $sql === false ? false : (string) $sql;
        $this->data['codeing']   = 'utf8';
        $this->data['set_ssl']   = $ssl;
        $this->data['force_ssl'] = $https;


        if ($this->data['ftp'] === true && (new AAPanelFTP())->Verify($ftpUsername, $ftpPassword) === false) 
        {
            echo json_encode(array());
            return;
        }

        $this->data['ftp_username'] = $ftpUsername;
        $this->data['ftp_password'] = $ftpPassword;


        if ($this->data['sql'] !== false && (new AAPanelDatabase())->Verify($sqlDataUser, $sqlDataPassword) === false) 
        {
            echo json_encode(array());
            return;
        }

        $this->data['datauser']     = $sqlDataUser;
        $this->data['datapassword'] = $sqlDataPassword;

        return (parent::Execute($url, $this->data));
    }
    
    /**
     * @description Delete Site
     * @param $id
     * @param $domain
     * @param bool $ftp
     * @param bool $this->database
     * @param bool $path
     * @return mixed
     */
    public function Delete($id, $domain, bool $ftp = true, bool $database = true, bool $path = true): mixed
    {
        $url = $this->serverUrl . '/site?action=DeleteSite';

        $this->data['id']       = $id;
        $this->data['webname']  = $domain;
        $this->data['ftp']      = $ftp;
        $this->data['database'] = $database;
        $this->data['path']     = $path;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Update Site Note
     * @param int $id
     * @param string $description
     * @return mixed
     */
    public function Note(int $id, string $description): mixed
    {
        $url = $this->serverUrl . '/data?action=setPs&table=sites';

        $this->data['id']       = $id;
        $this->data['ps']       = $description;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Turn On/Off Base directory limit [Anti-XSS attack (Base directory limit)(open_basedir)]
     * @param int $id
     * @param string $domain
     * @return mixed
     */
    public function BaseDir(int $id, string $domain): mixed
    {
        $url = $this->serverUrl . '/site?action=SetDirUserINI';

        $this->data['id']       = $id;
        $this->data['path']     = '/www/wwwroot/' . $domain;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Set File Default
     * @param int $id
     * @return mixed
     */
    public function SetIndex(int $id): mixed
    {
        $url = $this->serverUrl . '/site?action=SetIndex';

        $this->data['id']       = $id;
        $this->data['Index']    = 'index.php';
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Get File Default
     * @param int $id
     * @return mixed
     */
    public function GetIndex(int $id): mixed
    {
        $url = $this->serverUrl . '/site?action=GetIndex';

        $this->data['id']       = $id;
        return (parent::Execute($url, $this->data));
    }
}
