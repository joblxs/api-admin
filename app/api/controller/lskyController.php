<?php
namespace app\api\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;// 必须的
use yzh52521\EasyHttp\Http;

#[Apidoc\Title("兰空图床")]
class LskyController
{
    // 接口URL
    public $url = "https://pic.lxshuai.top/api/v1";

    #[
        Apidoc\Title("获取兰空token"),
        Apidoc\Tag("兰空"),
        Apidoc\Method("GET"),
        Apidoc\Url("/api/lsky/getTokens"),
        Apidoc\Query(name:"email",type: "string",require: true,desc: "邮箱",mock:"@email"),
        Apidoc\Query(name:"password",type: "string",require: true,desc: "密码",mock:"@string(5)"),
        Apidoc\Returned("token",type: "string",desc: "token"),
    ]
    public function getTokens(Request $request)
    {
        $email = $request->get('email', '1591451405@qq.com');
        $password = $request->get('password', '10086xiao');

        $response = Http::asJson()->post("https://pic.lxshuai.top/api/v1/tokens", ['email' => $email, 'password' => $password]);
        // 返回json
        return json([
            'code' => 0, 
            'msg' => 'ok', 
            'data' => json_decode($response)
        ]);
    }

    // 5|mkeqp2oAHGIQIX92X8FAgvuxjfK8Ih3Jhu6cRTJc
}