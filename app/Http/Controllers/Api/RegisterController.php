<?php
/**
 * Created by PhpStorm.
 * User: baimifan-pc
 * Date: 2017/8/22
 * Time: 14:38
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 注册
     * param: user_name user_mail user_pwd
     */

    public function register(Request $request){
       $RequestData             = $request->except('s');
       $RequestData['user_pwd'] = sha1($RequestData['user_pwd']);
       $s = DB::table('user')->insertGetId($RequestData);

       $this->mail($RequestData['user_mail'],$s,0);
       if($s){
           $retJson['code'] = 200;
           $retJson['msg'] = '邮件发送成功';
       }else{
           $retJson['code'] = 404;
           $retJson['msg'] = '邮件发送失败';
       }

       return response()->json($retJson);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 发送邮箱
     * param :user_id mail
     */

    public function mail($mail,$user_id,$type){

        $user = sha1('abc').rand(100,999).$user_id.$type.sha1($mail);

        $email = 'http://lhb.sunday.so/api/checkMail/'.$user;

        $s = Mail::to($mail)->send(new Reminder($email));

        if($s == NULL){
            //过期时间 15分钟
            $insert['token_extime'] = time()*60*15;
            $insert['url']          = '/api/checkMail/'.$user;
            $insert['type']         = $type;
            DB::table('mail')->insert($insert);
            $retJson['code'] = 200;
            $retJson['msg']  = '邮件发送成功';
        }else{
            $retJson['code'] = 404;
            $retJson['msg']  = '邮件发送失败';
        }

        return response()->json($retJson);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description :method description : 验证地址
     */

    public function checkMail(Request $request){
        $data = $request->all();

        $map['id'] = substr($data['s'], 58,1);
        //邮件类型
        $type      = substr($data['s'], 59,1);
        //邮箱
        $Cmail     = substr($data['s'], 60);

        $check = DB::table('mail')->where(['url'=>$data['s']])->first();

        if($check){
            $time = time();
            if($time > $check->token_extime){
                $retJson['code'] = 403;
                $retJson['msg']  = '链接已过期';
            }else{
                //注册
                if($type == 0){
                    DB::table('user')->where($map)->update([
                        'is_check_mail'=>1
                    ]);
                    $retJson['code'] = 200;
                    $retJson['msg']  = '邮件验证成功';
                }else{
                    $Umail = DB::table('user')->where($map)->value('user_mail');
                    if(empty($Umail)){
                        $retJson['code'] = 402;
                        $retJson['msg']  = '该用户暂未绑定邮箱';
                    }else if(sha1($Umail) != $Cmail){
                        $retJson['code'] = 401;
                        $retJson['msg']  = '该用户暂未绑定邮箱';
                    }else{
                        $retJson['code'] = 200;
                        $retJson['msg']  = '邮件验证成功';
                        //跳转至忘记密码页面
                    }
                }
            }

        }else{
            $retJson['code'] = 404;
            $retJson['msg']  = '邮件验证失败';
        }

        return response()->json($retJson);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 登录
     * param: account 账号  user_pwd 密码
     */

    public function login(Request $request){
        $LoginData = $request->except('s');
        $UserData =  DB::table('user')->where(['user_name'=>$LoginData['account']])
                                        ->orWhere(['user_mail'=>$LoginData['account']])
                                        ->orWhere(['user_phone'=>$LoginData['account']])->first();
        if(empty($UserData)){
            $retJson['code'] = 404;
            $retJson['msg']  = '用户未注册';
        }else{
            if(sha1($LoginData['user_pwd']) == $UserData->user_pwd){
                $retJson['code'] = 200;
                $retJson['msg']  = '登录成功';
            }else{
                $retJson['code'] = 403;
                $retJson['msg']  = '密码错误';
            }
        }

        return response()->json($retJson);
    }


    public function forget(Request $request){
        $ForgetData = $request->except('s');
        $s = $this->mail($ForgetData['user_mail'],$ForgetData['user_id'],1);

        if($s->original['code']){
            $retJson['code'] = 200;
            $retJson['msg']  = '邮件发送成功';
        }else{
            $retJson['code'] = 403;
            $retJson['msg']  = '邮件发送失败';
        }

        return response()->json($retJson);
    }
}