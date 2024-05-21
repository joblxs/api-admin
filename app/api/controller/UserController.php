<?php
namespace app\api\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;// 必须的

#[Apidoc\Title("user示例")]
class UserController
{
    #[
        Apidoc\Title("请求user接口"),
        Apidoc\Tag("示例"),
        Apidoc\Method("GET"),
        Apidoc\Url("/api/user/hello"),
        Apidoc\Query(name:"name",type: "string",require: true,desc: "姓名",mock:"@name"),
        Apidoc\Query(name:"phone",type: "string",require: true,desc: "手机号",mock:"@phone"),
        Apidoc\Returned("id",type: "int",desc: "Id"),
    ]
    public function hello(Request $request)
    {
        $default_name = 'webman';
        $default_phone = '10000';
        // 从get请求里获得name参数，如果没有传递name参数则返回$default_name
        $name = $request->get('name', $default_name);
        $phone = $request->get('phone', $default_phone);
        // 返回json
        return json([
            'code' => 0, 
            'msg' => 'ok', 
            'data' => [$name, $phone]
        ]);
    }
}