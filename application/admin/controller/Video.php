<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/8
 * Time: 18:13
 */
namespace app\admin\controller;

use lib\Page;
use think\Controller;
use think\Db;

class Video extends Controller
{
    public function video_list()
    {
        $video_list = Db::name('video')->select();
        $arr = new Page($video_list,10);
        $this ->assign(['vlist'=>$arr]);
        return view('Video/video_list');
    }

    public function video_add()
    {
        $video_cate_list = Db::name('advertise_type')->select();
        $this ->assign('vclist',$video_cate_list);
        return view('Video/video_add');
    }

    public function video_info_add()
    {
        $data = input();
        $file = request()->file();
        $data['vpath'] = $this->getNewVideo($file['vd']);
        $data['vimgname'] = $this->getNewVideoImg($file['vimg']);
        $res = Db::name('video')->insert($data);
        if ($res){
            $this->success('视频添加成功','Video/video_list');
        }else{
            $this->error('视频添加失败');
        }

    }
    protected function getNewVideo ($fileVideo){
        $imgName = date('YmdHis').rand(10000,99999);
        $infoVideo = $fileVideo
            ->validate(['size'=>104857600,'ext'=>'mp4,mpg,flv,rmvb,avi,wmv'])
            ->move(ROOT_PATH . 'public/static/admin' . DS . 'videos/'.date('Ymd'),$imgName);
        if($infoVideo){
            // 成功上传后 获取上传信息
            //获取保存路径加名字
           $videoPath = $infoVideo->getSaveName();
        }
        return $videoPath;
    }
    protected function getNewVideoImg($fileVideoImg){
        $imgName = date('YmdHis').rand(10000,99999);
        $infoImg = $fileVideoImg
            ->validate(['size'=>315000,'ext'=>'jpg,png,gif'])
            ->move(ROOT_PATH . 'public/static/admin/videos' . DS . 'uploads/'.date('Ymd'),$imgName);
        if($infoImg){
            // 成功上传后 获取上传信息
            //获取保存路径加名字
            $vimgname = $infoImg->getSaveName();
        }
        return $vimgname;
    }
}