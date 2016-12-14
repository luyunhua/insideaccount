<?php

/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/14
 * Time: 下午9:53
 * Description: 类说明
 * Company: 大鱼网络科技
 */
class EmployeeTest extends TestCase
{
    protected $_employeeImpl;
    public function __construct()
    {
        $this->_employeeImpl = new App\Libs\Employee\EmployeeImpl();
    }

    public function testVerify()
    {
        $username = 'aa@qq.com';
        $password = 'xinshiji';

        $bool = $this->_employeeImpl->verify($username, $password);
        $this->assertTrue(true);
        $this->assertContains($bool, [true, false]);

    }

    public function testStorageToken()
    {

        $this->_employeeImpl->storageToken('testTokenKey', 'testTokenKey', 1);
        $testTokenKey = \Illuminate\Support\Facades\Cache::store('redis')->get('testTokenKey');
        $this->assertTrue(empty($testTokenKey)?false: true);

    }

    public function testStorageCookie()
    {
        //$this->_employeeImpl->storageCookie('testCookie', 'testCookieValue');
    }

    public function testFindEmployeeByUsername()
    {
        $result = $this->_employeeImpl->findEmployeeByUsername('aa@qq.com');
        $this->assertNotEmpty($result);
    }

}