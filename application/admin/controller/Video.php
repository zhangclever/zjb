<?php

namespace app\admin\controller;

use lib\Page;
use think\Db;

class Video extends Basic
{
    public function video_list()
    {
        $video_list = Db::query('select v.*,a.typename from zjb_video as v , zjb_advertise_type as a WHERE v.states=a.id ORDER BY v.id ASC');
        $arr = new Page($video_list, 5);
        $this->assign(['vlist' => $arr]);
        return view('Video/video_list');
    }

    public function video_add()
    {
        $video_cate_list = Db::name('advertise_type')->select();
        $this->assign('vclist', $video_cate_list);
        return view('Video/video_add');
    }

    public function video_info_add()
    {
        $data = input();
        $file = request()->file();
        if ($data['vname'] == null) {
            $this->error('视频名称必须添加');
        }
        if (!isset($file['vimg'])) {
            $this->error('视频主图必须添加');
        }
        if (!isset($file['vd'])) {
            $this->error('视频文件必须添加');
        }
        $imgName = date('YmdHis') . rand(10000, 99999);
        $info = $file['vd']
            ->validate(['size' => 104857600, 'ext' => 'mp4,mpg,flv,rmvb,avi,wmv'])
            ->move(ROOT_PATH . 'public/static/admin' . DS . 'videos/' . date('Ymd'), $imgName);
        if ($info) {
            // 成功上传后 获取上传信息
            //获取保存路径加名字
            $data['vpath'] = date('Ymd') . '/' . $info->getSaveName();
        } else {
            $file['vd']->getError();
        }
        $infoImg = $file['vimg']
            ->validate(['size' => 315000, 'ext' => 'jpg,png,gif'])
            ->move(ROOT_PATH . 'public/static/admin/videos' . DS . 'vImg/' . date('Ymd'), $imgName);
        if ($infoImg) {
            // 成功上传后 获取上传信
            //获取保存路径加名字
            $data['vimgname'] = $infoImg->getFileName();
            $data['vimgpath'] = 'vImg/' . date('Ymd');
        } else {
            $file['vimg']->getError();
        }
        $res = Db::name('video')->insertGetId($data);
        if ($res) {
            $this->success('视频添加成功,编号为:' . $res, 'Video/video_list');
        } else {
            $this->error('视频添加失败');
        }
    }

    public function video_read()
    {
        $id = input();
        if ($id) {
            $video_info = Db::query('select v.*,a.typename from zjb_video as v , zjb_advertise_type as a WHERE v.states=a.id AND v.id=' . $id['id']);
//            var_dump($video_info[0]['vpath']);exit;
            $video_info[0]['vpath'] = substr($video_info[0]['vpath'], 9);
            $this->assign('video_info', $video_info);
        }
        return view('video_read');
    }

    public function video_edit()
    {
        $id = input();
        if ($id) {
            $video_info = Db::query('select v.*,a.typename from zjb_video as v , zjb_advertise_type as a WHERE v.states=a.id AND v.id=' . $id['id']);
            $this->assign('video_info', $video_info);
            $video_cate = Db::name('advertise_type')->select();
            $this->assign('video_cate', $video_cate);
        }
        return view('video_edit');
    }

    public function video_info_edit()
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
                $this->error('图片修改失败', url('Video/video_edit', 'id=' . $data['id']));
            }
        }/*若未更新图片，直接进行商品信息的更新*/
        $arr = array_filter($data);
        $res = Db::name('video')->where('id', $data['id'])->update($arr);
        if ($res) {
            $this->success('修改成功', 'Video/video_list');
        } else {
            $this->error('修改失败', url('Video/video_edit', 'id=' . $data['id']));
        }

    }

    public function video_del()
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
            $this->success('删除成功', 'Video/video_list');
        } else {
            $this->error('删除失败', 'Video/video_list');
        }
    }

    public function video_status_edit($id, $status)
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