<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelLogs
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelLogs extends AAPanelConnect
{
    /**
     * Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function GetLogs($limit = 10): mixed
    {
        $url = $this->serverUrl . '/data?action=getData';

        $this->data['table'] = 'logs';
        $this->data['limit'] = $limit;
        $this->data['tojs'] = 'test';
        return parent::Execute($url, $this->data);
    }


    public function ClearPainelLogs()
    {
        $url = $this->serverUrl . '/ajasx?action=delClose';

       

        return parent::Execute($url, $this->data);
    }

    public function DelLogs()
    {
        $url = $this->serverUrl . '/config?action=SetControl';

        $this->data['type'] = 'del';

        return parent::Execute($url, $this->data);
    }
}
