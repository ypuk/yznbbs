<?php
// +----------------------------------------------------------------------
// | YznBBS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://yznbbs.applinzi.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@.qq.com> <http://yznbbs.applinzi.com>
// +----------------------------------------------------------------------

namespace Home\Controller;
/**
 * 个人设置控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class SetController extends HomeController {
    public function index(){
        _login_state();
        $user = M('Member') ->where(array('id' =>is_login())) ->find();
        $this ->assign('user',$user);
        $this ->display();

        
    }
    
    public function password(){
        _login_state();
        if(IS_POST){
          $res=D('Member') ->_password();     
          if(!$res){
              $this ->error(D('Member') ->getError());
          }else{
              $this ->success('修改成功');
          }
        }

    }
    
    public function info(){
        _login_state();
        if(IS_POST){
          $res = D('Member') ->_info();     
          if(!$res){
              $this ->error(D('Member') ->getError());
          }else{
              $this ->success('保存成功');
          }
        }

    }

}