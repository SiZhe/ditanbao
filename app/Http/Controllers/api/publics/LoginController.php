<?php

namespace App\Http\Controllers\api\publics;

use Illuminate\Support\Facades\Request;
use EasyWeChat\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Tools\Utils\Trat\PassportTokenTrat;

class LoginController extends BaseController {
	
    use PassportTokenTrat;
    
    public function register() {
        $code = Request::input('code');
        $app = Factory::miniProgram(config('wechat.mini_program.default'));
        $result = $app->auth->session($code);
        $data = [
            'nickname' => Request::input('nickname'),
            'avatar' => Request::input('avatar'),
            'gender' => Request::input('gender'),
            'openid' => $result->openid
        ];
        $user = $this->saveMember($data);
        return $this->getToken($user);
    }
    
    public function login() {
        $username = Request::input('username');
        $password = Request::input('password');
        if(is_null($username) OR is_null($password)) {
            return $this->error(self::ERROR_PARAMETER);
        }
        $user = User::where('username', $username)->first();
        if(is_null($user)) {
            return $this->error(self::ERROR_USER_NOT_EXIST);
        }
        if(Auth::guard('user')->attempt([
            'username' => $username,
            'password' => $password,
        ], true)) {
            $user = auth('user')->user();
            if($user->disabled) {
                return $this->error(self::ERROR_ACCOUNT_DISABLED);
            }
            return $this->getToken($user);
        }
        return $this->error(self::ERROR_LOGIN_FAILED);
    }
    
    public function quickLogin() {
        $code = Request::input('code');
        $app = Factory::miniProgram(config('wechat.mini_program.default'));
        $result = $app->auth->session($code);
        if(!isset($result['openid'])) {
            return $this->error(self::ERROR_WECHAT_INVALID_CODE);
        }
        $user = User::where('openid', $result['openid'])->first();
        if(is_null($user)) {
            return $this->error(self::ERROR_WECHAT_NOT_BINDING);
        }
        return $this->getToken($user); 
    }
    
    public function logout() {
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->user()->token()->delete();
            return $this->respOK();
        }
        return $this->error(self::ERROR_OPERATION);
    }
    
    private function getToken($user) {
        try {
            $bearerToken = $this->getBearerTokenByUser($user, config('passport.password_access_client.id'), false);
            if($bearerToken) {
                $result = [
                    'expiresIn' => $bearerToken['expires_in'],
                    'accessToken' => $bearerToken['access_token'],
                    'refreshToken' => $bearerToken['refresh_token'],
                ];
                return $this->respOK($result);
            }
        } catch (\Exception $e) {
            return $this->error(self::ERROR_GET_ACCESS_TOKEN);
        }
    }
    
    private function saveMember($data) {
        $user = User::where('openid', $data['openid'])->first();
        if(is_null($user)) {
            $user = new User();
            $user->openid = $data['openid'];
            $user->version = User::VERSION_COMMON;
        }
        $user->nickname = $data['nickname'];
        $user->avatar = $data['avatar'];
        $user->gender = $data['gender'];
        $user->save();
        
        return $user;
    }
    
}