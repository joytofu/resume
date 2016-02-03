<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once(QQ_CONNECT_SDK_CLASS_PATH."ErrorCase.class.php");
class Recorder{
    private static $data;
    private $inc;
    private $error;

    public function __construct(){
        $this->error = new ErrorCase();

        //-------读取配置文件
        //$incFileContents = '{"appid":"101286499","appkey":"99c00a6789a53a5bf24e2d9fdc7c6534","callback":"www.kcswag.cn/callback.php","scope":"get_user_info,add_share,add_weibo","errorReport":true,"storageType":"file","host":"localhost","user":"QQ_CONNECT_SDK_ROOT","password":"QQ_CONNECT_SDK_ROOT","database":"test"}';
        $this->inc->appid = '101286499';
        $this->inc->appkey = '99c00a6789a53a5bf24e2d9fdc7c6534';
        $this->inc->callback = 'http://www.kcswag.cn/callback.php';
        //$this->inc->callback = '127.0.0.1:8888/resume/callback.php';
        $this->inc->scope = 'get_user_info,add_share,add_weibo';
        $this->inc->errorReport = 'true';
        $this->inc->storageType = 'file';
        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty($_SESSION['QC_userData'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name,$value){
        self::$data[$name] = $value;
    }

    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }

    public function readInc($name){
        if(empty($this->inc->$name)){
            return null;
        }else{
            return $this->inc->$name;
        }
    }

    public function delete($name){
        unset(self::$data[$name]);
    }

    function __destruct(){
        $_SESSION['QC_userData'] = self::$data;
    }
}
