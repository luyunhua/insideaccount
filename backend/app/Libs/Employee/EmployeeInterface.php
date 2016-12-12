<?php

/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/8
 * Time: 下午3:05
 * Description: 类说明
 * Company: 大鱼网络科技
 */

namespace App\Libs\Employee;

interface EmployeeInterface
{
    /**@description 验证用户登录接口
     * @param $username
     * @param $password
     * @return mixed
     */
    public function verify($username, $password);

    /**@description 存储用户token至缓存(redis)
     * @param $key
     * @param $value
     * @param $expire  int
     * @return mixed
     */
    public function storageToken($key, $value, $expire);

    /**@description 存储cookie
     * @param $key string
     * @param $value string
     * @param $expire integer
     * @param $domain string
     * @return mixed
     */
    public function storageCookie($key, $value, $expire = 10, $domain = '/');

    /**@description 根据用户名返回用户信息
     * @param $username
     * @return mixed
     */
    public function findEmployeeByUsername($username);

}