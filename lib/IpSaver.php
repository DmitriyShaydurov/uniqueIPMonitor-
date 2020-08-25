<?php
namespace lib;

use lib\DbInerface;

/**
 * IpSaver
 * saves unique user ip
 */
class IpSaver
{
    protected $db;
    protected $server;

    protected $varsToCheck =
        [
        'HTTP_CLIENT_IP', // if user uses proxy this is a first place to look
        'HTTP_X_FORWARDED_FOR', // if above mentioned not found proxies use this variable to store real user IP
        'REMOTE_ADDR' // if proxy is not used
        ];

    /**
     * __construct
     *
     * @param  DbInerface $Db
     * @param  mixed $server
     * @return void
     */
    public function __construct(DbInerface $Db, $server)
    {
        $this->db = $Db;
        $this->server = $server;
    }
    
    /**
     * saveUserIp
     *
     * @return void
     */
    public function saveUserIp()
    {
        $ip = $this->getUserIp();
        if ($ip === false) {
            return;
        }
        if (!$this->isUniqueUser($ip)) {
            return;
        }

        $this->db->insertUser($ip);
    }
        
    /**
     * getUserQuantity
     *
     * @return int
     */
    public function getUserQuantity()
    {
        return $this->db->getUserQuantity();
    }

    /**
     * getUserIp
     *
     * @return mixed
     */
    protected function getUserIp()
    {
        foreach ($this->varsToCheck as $varToCheck) {
            $ip = $this->isIp($this->server[$varToCheck]);
            if ($ip) {
                return $ip;
            }
        }
        return false;
    }
    
    /**
     * checks is it a valid IP
     *
     * @param  mixed $ip
     * @return mixed
     */
    protected function isIp($ip)
    {
        return (filter_var($ip, FILTER_VALIDATE_IP)) ? $ip : false;
    }
    
    /**
     * checks is it a unique user
     *
     * @param  mixed $ip
     * @return boolean
     */
    protected function isUniqueUser($ip)
    {
        return $this->db->isUniqueUser($ip);
    }
}
