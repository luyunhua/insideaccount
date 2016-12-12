<?php

/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/8
 * Time: 下午3:07
 * Description: 类说明
 * Company: 大鱼网络科技
 */

namespace App\Libs\Employee;

use App\Libs\LException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmployeeImpl implements EmployeeInterface
{
    protected $_connection = 'mysql';
    protected $_prefix = '';
    protected $_db = null;

    public function __construct()
    {
        $this->_prefix = env('DB_PREFIX');
        $this->_connection = env('DB_CONNECTION');
        $this->_db = DB::connection($this->_connection);
    }

    public function verify($username, $password)
    {
        if (empty($username)) {
            throw new LException('username为空');
        }
        if (empty($password)) {
            throw new LException('password为空');
        }

        $sqlEmployee = "select * from {$this->_prefix}employee WHERE username='{$username}'";
        $resultEmployee = $this->_db->selectOne($sqlEmployee);
        if ( $resultEmployee === null ) {
            return false;
        }
        //验证密码
        $boolVerify = password_verify($password, $resultEmployee->password);
        return $boolVerify;
    }

    public function storageToken($key, $value, $expire)
    {
        Cache::store('redis')->put($key, $value, 10);
    }


    public function storageCookie($key, $value, $expire = 10, $domain = '', $path='/')
    {
        setcookie($key, $value, time()+60*$expire, $path, $domain?$domain:env('DOMAIN'));
    }


    public function findEmployeeByUsername($username)
    {
        $sqlEmployee = "SELECT * FROM {$this->_prefix}employee WHERE username='{$username}'";
        return $this->_db->selectOne($sqlEmployee);
    }


}