<?php
/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/8
 * Time: 下午3:29
 * Description: 类说明
 * Company: 大鱼网络科技
 */

$app->group(['prefix' => ''], function () use ($app) {
    //framework test action
    $app->post('/employee/verify', [
        'uses' => 'EmployeeController@verify'
    ]);


});
