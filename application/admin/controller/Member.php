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

class Member extends Basic
{
    public function member_list()
    {
        $title = input('title');
        $search = ['query'=>[]];
        $search['query']['title'] = $title;
        /*----------搜索and or混合查询-----------*/
        $list = Db::table(['zjb_member'=>'m','zjb_dealer'=>'d'])
            ->field('m.*,d.dname')
            ->where('m.did=d.id')
            ->where('username|mobel|cardnum','like','%'.$title.'%')
            ->order('m.id desc')
            ->paginate(10,false,$search);

        $this->assign('list',$list);
        $this->assign('title',$title);
        return view('Member/member_list');
    }

    public function member_add()
    {
        $member_cate_list = Db::name('dealer')->select();
        $this->assign('dlist', $member_cate_list);
        return view('Member/member_add');
    }

    public function member_info_add()
    {
        $data = input();
        $result = $this->validate($data,'Member.member_add');
        if (true !== $result) {
            $this->error($result, 'Member/member_add');
        }
        $file = request()->file();
        if (!isset($file['userimg'])) {
            $this->error('会员正面照必须添加');
        }
        if (!isset($file['usercardimg'])) {
            $this->error('会员身份证照片必须添加');
        }
        $imgName = date('YmdHis') . rand(10000, 99999);
        $info = $file['userimg']
            ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
            ->move(ROOT_PATH . 'public/static/admin' . DS . 'userInfo/userimg/' . date('Ymd'), $imgName);
        if ($info) {
            // 成功上传后 获取上传信息
            //获取保存路径加名字
            $data['uimg'] = 'userimg'.'/'.date('Ymd') . '/' . $info->getSaveName();
        } else {
            $file['userimg']->getError();
        }
        $infoImg = $file['usercardimg']
            ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
            ->move(ROOT_PATH . 'public/static/admin/userInfo' . DS . 'ucard/' . date('Ymd'), $imgName);
        if ($infoImg) {
            // 成功上传后 获取上传信
            //获取保存路径加名字
            $data['ucdimg'] = 'ucard'.'/'.date('Ymd') . '/' .$infoImg->getFileName();
        } else {
            $file['usercardimg']->getError();
        }
        $data['upath'] = 'userInfo';
        $res = Db::name('member')->insertGetId($data);
        if ($res) {
            $this->success('视频添加成功,编号为:' . $res, 'Member/member_list');
        } else {
            $this->error('视频添加失败');
        }
    }

    public function member_read()
    {
        $id = input();
        if ($id) {
            $member_info = Db::query('select m.*,d.dname from zjb_member as m ,zjb_dealer as d WHERE m.did=d.id AND m.id = '.$id['id']);
            $this->assign('member_info', $member_info);
        }
        return view('member_read');
    }

    public function member_edit()
    {
        $id = input();
        if ($id) {
            $member_info = Db::query('select m.*,d.dname from zjb_member as m ,zjb_dealer as d WHERE m.did=d.id AND m.id = '.$id['id']);
            $this->assign('member_info', $member_info);
            $member_cate = Db::name('dealer')->select();
            $this->assign('member_cate', $member_cate);
        }
        return view('member_edit');
    }

    public function member_info_edit()
    {
        $data = $_POST;
        //获取上传的图片并进行路径修改和原图片的删除
        $file = request()->file();
        if (isset($file)) {//判断是否有图片信息上传更新
            //根据修改信息的id获取原图片地址
            $link = Db::name('member')
                ->where('id', $data['id'])
                ->field('upath , uimg , ucdimg')
                ->find();//先获取原图片的地址
            /*为新图片命名*/
            $imgName = date('YmdHis') . rand(10000, 99999);
            /*对新图片进行验证，并进行添加*/
            if(isset($file['userimg']))
            {
                $info = $file['userimg']->validate(['size' => 5242880, 'ext' => 'jpg,png'])
                    ->move(ROOT_PATH . 'public/static/admin/userInfo' . DS . 'userimg' . '/' . date('Ymd'), $imgName);
                if ($info) {
                    //自定义存储的img名称
                    $data['uimg'] = 'userimg'.'/'.date('Ymd') . '/' . $info->getSaveName();
                    /*更新成功删除原图片*/
                    $uimgurl = ROOT_PATH . 'public/static/admin/' . $link['upath'] . '/' . $link['uimg'];
                    /*图片删除*/
                    unlink($uimgurl);
                } else {
                    // 上传失败获取错误信息
                    $this->error('图片修改失败', url('Member/member_edit', 'id=' . $data['id']));
                }
            }
            if(isset($file['usercardimg']))
            {
                $cardImg = $file['usercardimg'] ->validate(['size' => 5242880, 'ext' => 'jpg,png'])
                    ->move(ROOT_PATH . 'public/static/admin/userInfo' . DS . 'ucard' . '/' . date('Ymd'), $imgName);
                if($cardImg){
                    $data['ucdimg'] = 'ucard'.'/'.date('Ymd') . '/' . $cardImg->getSaveName();
                    /*更新成功删除原图片*/
                    $ucdurl = ROOT_PATH . 'public/static/admin/' . $link['upath'] . '/' . $link['ucdimg'];
                    /*图片删除*/
                    unlink($ucdurl);
                }else {
                    // 上传失败获取错误信息
                    $this->error('图片修改失败', url('Member/member_edit', 'id=' . $data['id']));
                }
            }
        }/*若未更新图片，直接进行商品信息的更新*/
        $data['upath'] = 'userInfo';
        $arr = array_filter($data);
        $res = Db::name('member')->where('id', $data['id'])->update($arr);
        if ($res) {
            $this->success('修改成功', 'Member/member_list');
        } else {
            $this->error('修改失败', url('Member/member_edit', 'id=' . $data['id']));
        }

    }

    public function member_del()
    {
        $id = input('id');
        $img = Db::name('member')
            ->where('id', $id)
            ->field('upath , uimg , ucdimg')
            ->find();
        $uimgurl = ROOT_PATH . 'public/static/admin/' . $img['upath'] . '/' . $img['uimg'];
        /*图片删除*/
        unlink($uimgurl);
        $ucdurl = ROOT_PATH . 'public/static/admin/' . $img['upath'] . '/' . $img['ucdimg'];
        /*图片删除*/
        unlink($ucdurl);
        /*删除表中的信息*/
        $res = Db::name('member')->delete($id);
        if ($res) {
            $this->success('删除成功', 'Member/member_list');
        } else {
            $this->error('删除失败', 'Member/member_list');
        }
    }

    public function member_status_edit($id, $status)
    {
        if ($status == 0) {
            $res = Db::name('member')->where('id', $id)->setField('status', 1);
        } else {
            $res = Db::name('member')->where('id', $id)->setField('status', 0);
        }
        if ($res) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }
}