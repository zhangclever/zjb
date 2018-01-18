<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 12:02
 */

namespace app\admin\controller;

use lib\Page;
use think\Db;

class Dealer extends Basic
{
    public function dealer_list()
    {
        $dealer_list = Db::query('select d.*,ma.mname from zjb_dealer as d,zjb_manager as ma WHERE d.manager=ma.id');
        $arr1 = new Page($dealer_list, 10);
        $this->assign(['dlist' => $arr1]);
        return view('Dealer/dealer_list');
    }

    public function dealer_add()
    {
        $dealer_cate_list = Db::name('manager')->select();
        $this->assign('malist', $dealer_cate_list);
        return view('Dealer/dealer_add');
    }

    public function dealer_info_add()
    {
        $data = input();
        $result = $this->validate($data,'Dealer.dealer_add');
        if (true !== $result) {
            $this->error($result, 'Dealer/dealer_add');
        }
        $r = Db::name('dealer')->where('dcardnum',$data['dcardnum'])->find();
        if($r){
            $this->error('该经销商已存在，请勿重复添加');
        }
        $file = request()->file();
        if (!isset($file['dealerimg'])) {
            $this->error('经销商正面照必须添加');
        }
        if (!isset($file['dealercardimg'])) {
            $this->error('经销商身份证照片必须添加');
        }
        $imgName = date('YmdHis') . rand(10000, 99999);
        $info = $file['dealerimg']
            ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
            ->move(ROOT_PATH . 'public/static/admin' . DS . 'dealerInfo/dealerimg/' . date('Ymd'), $imgName);
        if ($info) {
            // 成功上传后 获取上传信息
            //获取保存路径加名字
            $data['dimg'] = 'dealerimg'.'/'.date('Ymd') . '/' . $info->getSaveName();
        } else {
            $file['dealerimg']->getError();
        }
        $infoImg = $file['dealercardimg']
            ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
            ->move(ROOT_PATH . 'public/static/admin/dealerInfo' . DS . 'dcard/' . date('Ymd'), $imgName);
        if ($infoImg) {
            // 成功上传后 获取上传信
            //获取保存路径加名字
            $data['dcdimg'] = 'dcard'.'/'.date('Ymd') . '/' .$infoImg->getFileName();
        } else {
            $file['dealercardimg']->getError();
        }
        $data['dpath'] = 'dealerInfo';
        $data['dpassword'] = sha1($data['dpassword']);
        $res = Db::name('dealer')->insertGetId($data);
        if ($res) {
            $duname = substr($data['dcardnum'],0,6).$res.rand(001,100);
            $su = Db::name('dealer')->where('id',$res)->setField('duname', $duname);
            if($su){
                $this->success('经销商添加成功,编号为:' . $duname, 'Dealer/dealer_list');
            }
        } else {
            $this->error('经销商添加失败');
        }
    }

    public function dealer_read()
    {
        $id = input();
        if ($id) {
            $dealer_info = Db::query('select d.*,ma.mname from zjb_dealer as d ,zjb_manager as ma WHERE d.manager=ma.id and d.id='.$id['id']);
            $this->assign('dealer_info', $dealer_info);
        }
        return view('dealer_read');
    }

    public function dealer_edit()
    {
        $id = input();
        if ($id) {
            $dealer_info = Db::query('select d.*,ma.mname from zjb_dealer as d ,zjb_manager as ma WHERE d.manager=ma.id and d.id='.$id['id']);
            $this->assign('dealer_info', $dealer_info);
            $manager_info = Db::name('manager')->select();
            $this->assign('manager_info',$manager_info);
        }
        return view('dealer_edit');
    }

    public function dealer_info_edit()
    {
        $data = $_POST;
        //获取上传的图片并进行路径修改和原图片的删除
        $file = request()->file();
        if (isset($file)) {//判断是否有图片信息上传更新
            //根据修改信息的id获取原图片地址
            $link = Db::name('dealer')
                ->where('id', $data['id'])
                ->field('dpath , dimg , dcdimg')
                ->find();//先获取原图片的地址
            /*为新图片命名*/
            $imgName = date('YmdHis') . rand(10000, 99999);
            /*对新图片进行验证，并进行添加*/
            if(isset($file['dealerimg']))
            {
                $info = $file['dealerimg']->validate(['size' => 5242880, 'ext' => 'jpg,png'])
                    ->move(ROOT_PATH . 'public/static/admin/dealerInfo' . DS . 'dealerimg' . '/' . date('Ymd'), $imgName);
                if ($info) {
                    //自定义存储的img名称
                    $data['dimg'] = 'dealerimg'.'/'.date('Ymd') . '/' . $info->getSaveName();
                    /*更新成功删除原图片*/
                    $uimgurl = ROOT_PATH . 'public/static/admin/' . $link['dpath'] . '/' . $link['dimg'];
                    /*图片删除*/
                    unlink($uimgurl);
                } else {
                    // 上传失败获取错误信息
                    $this->error('图片修改失败', url('Dealer/dealer_edit', 'id=' . $data['id']));
                }
            }
            if(isset($file['dealercardimg']))
            {
                $cardImg = $file['dealercardimg'] ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
                    ->move(ROOT_PATH . 'public/static/admin/userInfo' . DS . 'ucard' . '/' . date('Ymd'), $imgName);
                if($cardImg){
                    $data['dcdimg'] = 'dcard'.'/'.date('Ymd') . '/' . $cardImg->getSaveName();
                    /*更新成功删除原图片*/
                    $ucdurl = ROOT_PATH . 'public/static/admin/' . $link['dpath'] . '/' . $link['dcdimg'];
                    /*图片删除*/
                    unlink($ucdurl);
                }else {
                    // 上传失败获取错误信息
                    $this->error('图片修改失败', url('Dealer/dealer_edit', 'id=' . $data['id']));
                }
            }
        }/*若未更新图片，直接进行商品信息的更新*/
        $data['dpath'] = 'dealerInfo';
        if(!empty($data['dpassword'])){
            $data['dpassword'] = sha1($data['dpassword']);
        }
        $arr = array_filter($data);
        $res = Db::name('dealer')->where('id', $data['id'])->update($arr);
        if ($res) {
            $this->success('修改成功', 'Dealer/dealer_list');
        } else {
            $this->error('修改失败', url('Dealer/dealer_edit', 'id=' . $data['id']));
        }

    }

    public function dealer_del()
    {
        $id = input('id');
        $img = Db::name('dealer')
            ->where('id', $id)
            ->field('dpath , dimg , dcdimg')
            ->find();
        $uimgurl = ROOT_PATH . 'public/static/admin/' . $img['dpath'] . '/' . $img['dimg'];
        /*图片删除*/
        unlink($uimgurl);
        $ucdurl = ROOT_PATH . 'public/static/admin/' . $img['dpath'] . '/' . $img['dcdimg'];
        /*图片删除*/
        unlink($ucdurl);
        /*删除表中的信息*/
        $res = Db::name('dealer')->delete($id);
        if ($res) {
            $this->success('删除成功', 'Dealer/dealer_list');
        } else {
            $this->error('删除失败', 'Dealer/dealer_list');
        }
    }

    public function dealer_status_edit($id, $status)
    {
        if ($status == 0) {
            $res = Db::name('dealer')->where('id', $id)->setField('d_manage_state', 1);
        } else {
            $res = Db::name('dealer')->where('id', $id)->setField('d_manage_state', 0);
        }
        if ($res) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }
}