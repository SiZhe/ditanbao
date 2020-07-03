<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

class ApiController extends Controller {
    
    // COMMON
    protected const ERROR_PARAMETER = '10001';
    protected const ERROR_FORBIDDEN = '10002';
    protected const ERROR_OPERATION = '10003';
    protected const ERROR_LOGIN_FAILED = '10004';
    protected const ERROR_ACCOUNT_DISABLED = '10005';
    protected const ERROR_GET_ACCESS_TOKEN = '10006';
    protected const ERROR_STALL_EXIST = '10007';
    protected const ERROR_STALL_NOT_EXIST = '10008';
    protected const ERROR_CERTIFICATION_EXIST = '10009';
    protected const ERROR_STALL_NOT_OPEN = '10010';
    
    protected static $errors = [
        self::ERROR_PARAMETER => '参数错误',
        self::ERROR_FORBIDDEN => '您没有此权限',
        self::ERROR_OPERATION => '操作失败',
        self::ERROR_LOGIN_FAILED => '登录失败',
        self::ERROR_ACCOUNT_DISABLED => '账户已禁用',
        self::ERROR_GET_ACCESS_TOKEN => 'accessToken获取失败',
        self::ERROR_STALL_EXIST => '您已有摊位',
        self::ERROR_STALL_NOT_EXIST => '摊位不存在',
        self::ERROR_CERTIFICATION_EXIST => '认证已存在',
        self::ERROR_STALL_NOT_OPEN => '摊位未开通',
    ];
    
    public function respOK($response = null) {
        $data = [
            'code' => 200,
            'data' => []
        ];
        if(!is_null($response)) {
            $data['data'] = $response;
            if(isset($response->resource) and property_exists($response->resource, 'pageName')) {
                $data['pagination'] = [
                    'prevPageUrl' => $response->previousPageUrl(),
                    'currentPage' => $response->currentPage(),
                    'nextPageUrl' => $response->nextPageUrl(),
                ];
            }
        }
        return response($data)->setStatusCode(200);
    }
    
    public function error($errorCode) {
        return response([
            'code' => $errorCode,
            'msg' => self::$errors[$errorCode],
        ])->setStatusCode(200);
    }
    
}