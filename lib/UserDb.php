<?php
namespace lib;

use lib\DbInerface;

/**
 * Class UserDb
 *  Handles db operations
 */
class UserDb implements DbInerface
{
    private $db;
    const TODAY = 'SELECT ip FROM user_ip WHERE date_added >= CURDATE() ';
    
    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    
    /**
     * check is it a unique user
     *
     * @param  mixed $ip
     * @return bool
     */
    public function isUniqueUser($ip)
    {
        $ip = $this->db->fetchAll(self::TODAY . 'AND ip = :ip', ['ip' => $ip]);
        return (count($ip) === 0) ? true : false;
    }
    
    /**
     * insert user
     *
     * @param  string $ip
     * @return void
     */
    public function insertUser($ip)
    {
        $this->db->query('INSERT INTO user_ip (ip) VALUES (:ip)', ['ip' =>$ip]);
    }
    
    /**
     * get users quantity for today
     *
     * @return void
     */
    public function getUserQuantity()
    {
        return count($this->db->fetchAll(self::TODAY));
    }
}
