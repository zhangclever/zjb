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
//        $member_list = Db::query('select m.*,l.*,d.dname from zjb_member as m , zjb_dealer as d ,zjb_leve AS l WHERE m.mleve=l.id AND m.did=d.id ORDER BY m.id ASC');
        $member_list = Db::name('member')->select();
        $arr1 = new Page($member_list, 10);
        $this->assign(['mlist' => $arr1]);
        return view('Member/member_list');
    }

    public function member_add()
    {
        $member_cate_list = Db::name('advertise_type')->select();
        $this->assign('mclist', $member_cate_list);
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
            ->validate(['size' => 634880, 'ext' => 'jpg,png'])
            ->move(ROOT_PATH . 'public/static/admin' . DS . 'userInfo/userimg/' . date('Ymd'), $imgName);
        if ($info) {
            // 成功上传后 获取上传信息
            //获取保存路径加名字
            $data['uimg'] = 'userimg'.'/'.date('Ymd') . '/' . $info->getSaveName();
        } else {
            $file['userimg']->getError();
        }
        $infoImg = $file['usercardimg']
            ->validate(['size' => 634880, 'ext' => 'jpg,png'])
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
            $member_info = Db::name('member')->find($id);
//            $member_info = Db::query('select m.*,d.name from zjb_video as v , zjb_advertise_type as a WHERE v.states=a.id AND v.id=' . $id['id']);
///            var_dump($member_info[0]['vpath']);exit;
//            $member_info[0]['vpath'] = substr($member_info[0]['vpath'], 9);
            $this->assign('member_info', $member_info);
        }
        return view('member_read');
    }

    public function member_edit()
    {
        $id = input();
        if ($id) {
//            $member_info = Db::query('select v.*,a.typename from zjb_video as v , zjb_advertise_type as a WHERE v.states=a.id AND v.id=' . $id['id']);
            $member_info = Db::name('member')->find($id);
            $this->assign('member_info', $member_info);
//            $member_cate = Db::name('advertise_type')->select();
//            $this->assign('member_cate', $member_cate);
        }
        return view('member_edit');
    }

    public function member_info_edit()
    {
        $data = $_POST;
        //获取上传的图片并进行路径修改和原图片的删除
        $file = request()->file('vimg');
        if (isset($file)) {//判断是否有图片信息上传更新
            //根据修改信息的id获取原图片地址
            $link = Db::name('video')
                ->where('id', $data['id'])
                ->field('vimgpath , vimgname')
                ->find();//先获取原图片的地址
            /*为新图片命名*/
            $imgName = date('YmdHis') . rand(10000, 99999);
            /*对新图片进行验证，并进行添加*/
            $info = $file->validate(['size' => 315000, 'ext' => 'jpg,png,gif'])
                ->move(ROOT_PATH . 'public/static/admin/videos' . DS . 'vImg' . '/' . date('Ymd'), $imgName);
            if ($info) {
                //自定义图片存储路径
                $data['vimgpath'] = 'vImg/' . date('Ymd');
                //自定义存储的img名称
                $data['vimgname'] = $info->getFilename();
                /*更新成功删除原图片*/
                $url = ROOT_PATH . 'public/static/admin/videos/' . $link['vimgpath'] . '/' . $link['vimgname'];
                /*图片删除*/
                unlink($url);
            } else {
                // 上传失败获取错误信息
                $this->error('图片修改失败', url('Video/member_edit', 'id=' . $data['id']));
            }
        }/*若未更新图片，直接进行商品信息的更新*/
        $arr = array_filter($data);
        $res = Db::name('video')->where('id', $data['id'])->update($arr);
        if ($res) {
            $this->success('修改成功', 'Video/member_list');
        } else {
            $this->error('修改失败', url('Video/member_edit', 'id=' . $data['id']));
        }

    }

    public function member_del()
    {
        $id = input('id');
        $img = Db::name('video')
            ->where('id', $id)
            ->field('vimgpath , vimgname , vpath')
            ->find();
        $urlImg = ROOT_PATH . 'public/static/admin/videos/' . $img['vimgpath'] . '/' . $img['vimgname'];
        /*图片删除*/
        unlink($urlImg);
        $urlVideo = ROOT_PATH . 'public/static/admin/videos/' . $img['vpath'];
        /*视频删除*/
        unlink($urlVideo);
        /*删除表中的信息*/
        $res = Db::name('video')->delete($id);
        if ($res) {
            $this->success('删除成功', 'Video/member_list');
        } else {
            $this->error('删除失败', 'Video/member_list');
        }
    }

    public function member_status_edit($id, $status)
    {
        if ($status == 0) {
            $res = Db::name('video')->where('id', $id)->setField('status', 1);
        } else {
            $res = Db::name('video')->where('id', $id)->setField('status', 0);
        }
        if ($res) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }
}