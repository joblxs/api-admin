<?php

namespace app\controller;

use support\Request;

class IndexController
{
    public function index(Request $request)
    {
        $html = "<div style='width:100%;height:100%;font-size: 20px;text-align: center;'>
            欢迎来到api管理系统，<a href='/apidoc/index.html'>点击跳转</a>
        </div>";
        return $html;
    }
}
