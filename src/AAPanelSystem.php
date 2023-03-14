<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelSystem
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelSystem extends AAPanelConnect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Info()
    {
        $url = $this->serverUrl . '/system?action=GetSystemTotal';

        return (parent::Execute($url, $this->data));
    }

    public function Disk()
    {
        $url = $this->serverUrl . '/system?action=GetDiskInfo';

        return (parent::Execute($url, $this->data));
    }

    public function Network()
    {
        $url = $this->serverUrl . '/system?action=GetNetWork';

        return (parent::Execute($url, $this->data));
    }

    public function Size(string $path = '/www/wwwroot/'): mixed
    {
        $url = $this->serverUrl . '/files?action=GetDirSize';

        $this->data['path']   = $path;

        return (parent::Execute($url, $this->data));
    }
}
