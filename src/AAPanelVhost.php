<?php

namespace DevOpsSantana\AAPanel;

/**
 * Class AAPanelVhost
 * @package DevOpsSantana\AAPanel
 * @author Rogério Santana <https://github.com/devopssantana>
 * @since : 2022
 */
class AAPanelVhost extends AAPanelConnect
{
    /**
     * @description Class Construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $domain
     * @return mixed
     */
    public function Rewrite(string $domain): mixed
    {
        $url = $this->serverUrl . '/site?action=GetRewriteList';
        
        $this->data['siteName'] = $domain;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Read Data Vhosts Rewrite
     * @param string $subdomain
     * @return mixed
     */
    public function Read(string $subdomain): mixed
    {
        $url = $this->serverUrl . '/files?action=GetFileBody';
        
        $this->data['path'] = '/www/server/panel/vhost/rewrite/' . $subdomain . '.conf';
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Insert Data Vhosts Rewrite
     * @param string $subdomain
     * @param string $server
     * @param string $encoding
     * @return mixed
     */
    public function Write(string $subdomain, string $server, string $encoding = 'utf-8'): mixed
    {
        $url = $this->serverUrl . '/files?action=SaveFileBody';
        
        $this->data['data'] = $this->server($server);
        $this->data['path'] = '/www/server/panel/vhost/rewrite/' . $subdomain . '.conf';
        $this->data['encoding'] = $encoding;
        return (parent::Execute($url, $this->data));
    }

    /**
     * @description Rewrite Text
     * @param $server
     * @return string|void
     */
    private function server($server)
    {
        switch ($server) {
            case 'nginx':
                return 'autoindex off;
                        location / {
                          if ($request_uri !~ "-f"){
                            rewrite ^(.*)$ /index.php?route=$1;
                          }
                        }
                            
                        location ~ ^\.(htaccess|htpasswd|env|gitignore|ini)$ {
                          deny all;
                        }';
                break;
        }
    }
}