<?php
/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/8
 * Time: 下午3:22
 * Description: 类说明
 * Company: 大鱼网络科技
 */

namespace App\Http\Controllers;


use App\Libs\Employee\EmployeeImpl;
use App\Libs\Token\Token;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function verify(Request $request, EmployeeImpl $userImpl)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $smartRedirect = $request->input('smartRedirect');
        $boolVerify = $userImpl->verify($username, $password);
        if (!$boolVerify) {
            return redirect('/index.html?smartRedirect='.urlencode($smartRedirect));
        }
        $token = Token::generate('insidetoken');
        $rowEmployee = $userImpl->findEmployeeByUsername($username);
        $userImpl->storageToken($token, $rowEmployee, 10);
        $userImpl->storageCookie('token', $token);
        header('Location:'.urldecode($smartRedirect));
    }

}