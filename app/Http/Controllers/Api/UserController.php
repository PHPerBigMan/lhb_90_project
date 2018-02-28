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

class UserController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 保存资料
     * param:user_id nickName user_pic
     */

    public function ChangeUserInfo(Request $request){
        $ChangeUserInfo = $request->except('s');
        if(!empty($ChangeUserInfo['user_pic'])){
            $user_pic = $request->file('user_pic')->store('imgs','img');
        }

        $ChangeUserInfo['user_pic'] = empty($user_pic) ? DB::table('user')->where(['id'=>$ChangeUserInfo['user_id']])
            ->value('user_pic') : '/uploads/'.$user_pic;
        $map['id'] = $ChangeUserInfo['user_id'];
        unset($ChangeUserInfo['user_id']);
        $s = DB::table('user')->where($map)->update($ChangeUserInfo);

        if($s){
            $retJson['code'] = 200;
            $retJson['msg']  = '资料保存成功';
        }else{
            $retJson['code'] = 404;
            $retJson['msg']  = '资料保存失败';
        }
        return response()->json($retJson);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 修改密码
     * param:user_id  old_pwd  new_pwd
     */

    public function ChangePwd(Request $request){
        $PwdData = $request->except('s');
        $check = DB::table('user')->where(['id'=>$PwdData['user_id']])->first();
        if(sha1($PwdData['old_pwd']) == $check->user_pwd){
            DB::table('user')->where(['id'=>$PwdData['user_id']])->update([
                'user_pwd'=>sha1($PwdData['new_pwd'])
            ]);
            $retJson['code'] = 200;
            $retJson['msg']  = '修改成功';
        }else{
            $retJson['code'] = 404;
            $retJson['msg']  = '旧密码输入错误';
        }

        return response()->json($retJson);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * author hongwenyang
     * method description : 我的资料
     * param: user_id
     */

    public function UserInfo(Request $request){
        $UserData = $request->except('s');
        //用户个人资料
        $data = DB::table('user')->where(['id'=>$UserData])->select('user_name','user_unique_btc','user_unique_eth','is_check_mail','last_login_time')->first();
        //比特币
        $BtcData = json_decode($this->curl(0,$data->user_unique_btc),true);
        //以太币
        $EthData = json_decode($this->curl(1,$data->user_unique_eth),true);
        //
        $BtcRage = 80;
        $EthRage = 80;
        $data->count = $BtcData['total_received'] / 100000000 *$BtcRage + $EthData['total_received'] / 1000000000000000000 *$EthRage;

        dd($data);
    }


    /**
     * @param $type
     * @param $user_unique
     * @return mixed
     * author hongwenyang
     * method description : curl方法
     */
    
    public function curl($type,$user_unique){
        if($type == 0){
            $url = "https://api.blockcypher.com/v1/btc/main/addrs/".$user_unique."/balance";
        }else{
            $url = "https://api.blockcypher.com/v1/eth/main/addrs/".$user_unique."/balance";
        }
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    public function UserPhoneCheck(){
        $name = urlencode('洪文扬');
        $url = "http://route.showapi.com/1389-1?showapi_appid=2&showapi_sign=05aee77ddd534a3c80643a72cc8c9b09&idCard=320681199403097617&name=".$name."&phone=13858126467&needBelongArea=true";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        $output = curl_exec($ch);
        curl_close($ch);
        dd($output);
    }






    protected function returnData($data){
        if(empty($data)){
            $retJson['code'] = 404;
            $retJson['msg'] = "数据为空";
        }else{
            $retJson['code'] = 200;
            $retJson['msg'] = "获取数据成功";
        }

        $j = [
            'data'=>$data,
            'code'=>$retJson
        ];

        return $j;
    }

    public function img(Request $request){
        $imgData = $request->except('s');
        if(!empty($imgData['user_pic'])){
            $user_pic = $request->file('user_pic')->store('imgs','img');
        }
    }
}