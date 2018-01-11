<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 14:12
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\lib\Page;

class Goods extends Basic
{
    public function goods_list()
    {
        $goods_list = Db::query('select g.*,c.catename,i.* from zjb_goods as g , zjb_goods_cate as c , zjb_img as i WHERE g.cid=c.id AND g.imgid=i.id');
        $arr1 =new Page($goods_list,10);
        $this->assign(['glist'=>$arr1]);
        return view('goods_list');
    }

    public function goods_add()
    {
        $goods_cate =Db::name('goods_cate')->select();
        $this->assign('cate',$goods_cate);
        return view('goods_add');
    }

    public function goods_info_add()
    {
        $data = $_POST;
        $result = $this->validate($data,'Goods.goods_add');
        if (true !== $result){
            $this->error($result,'Goods/goods_add');
        }else{
            $file = request()->file('img');
            $imgName = date('YmdHis').rand(10000,99999);
            $info = $file->validate(['size'=>315000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads'.'/'.date('Ymd'),$imgName);
            if($info){
                //自定义图片存储路径
                $img['imgpath'] = date('Ymd');
                //自定义存储的img名称
                $img['imgname'] =$info->getFilename();
                $data['imgid']=Db::name('img')->insertGetId($img);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                }
        }
        $data['number'] = $data['cid'].date('Ymd').rand(001,100);
        $res = Db::name('goods')->insert($data);
        if ($res){
            $this->success('添加成功','Goods/goods_list');
        }else{
            $this->error('添加失败','Goods/goods_add');
        }
    }
    public function goods_read(){
        $id= input();
        if ($id) {
            $goods_info = Db::query('select g.*,c.catename,i.* from zjb_goods as g , zjb_goods_cate as c ,zjb_img as i WHERE g.cid=c.id AND g.imgid= i.id AND g.id=' . $id['id']);
            $this->assign('goods_info', $goods_info);
        }
        return view('goods_read');
    }

    public function goods_edit()
    {
        $id= input();
        if ($id) {
            $goods_info = Db::query('select g.*,c.catename,i.* from zjb_goods as g , zjb_goods_cate as c , zjb_img as i WHERE g.cid=c.id AND g.imgid= i.id AND g.id=' . $id['id']);
            $this->assign('goods_info', $goods_info);
            $goods_cate = Db::name('goods_cate')->select();
            $this->assign('goods_cate',$goods_cate);
        }
        return view('goods_edit');
    }

    public function goods_info_edit()
    {
        $data = $_POST;
        //验证表单上传信息
        $result = $this->validate($data,'Goods.goods_edit');
        if (true !== $result){
            $this->error($result,url('Goods/goods_edit','id='.$data['id']));
        }else {
            //获取上传的图片并进行路径修改和原图片的删除
            $file= request()->file('img');
            if (!is_null($file)){//如果更改图片，则更新图片表里的图片地址
                $link = Db::name('img')->where('id',$data['imgid'])->find();//先获取原图片的地址
                /*为新图片命名*/
                $imgName = date('YmdHis') . rand(10000, 99999);
                /*对新图片进行验证，并进行添加*/
                $info = $file->validate(['size' => 315000, 'ext' => 'jpg,png,gif'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads' . '/' . date('Ymd'), $imgName);
                if ($info) {
                    //自定义图片存储路径
                    $img['imgpath'] = date('Ymd');
                    //自定义存储的img名称
                    $img['imgname'] = $info->getFilename();
                    /*对图片的信息进行更新*/
                    $r = Db::name('img')->where('id', $data['imgid'])->update($img);
                    /*更新成功删除原图片*/
                    if ($r){
                        /*获取原图片位置*/
                        $url = ROOT_PATH . 'public/static/admin/uploads/' . $link['imgpath'] . '/' . $link['imgname'];
                        /*图片删除*/
                        unlink($url);
                    }
                } else {
                    // 上传失败获取错误信息
                    $this->error('图片修改失败', url('Goods/goods_edit', 'id=' . $data['id']));
                }
            }/*若未更新图片，直接进行商品信息的更新*/
//                var_dump(111);exit;
                $res = Db::name('goods')->where('id',$data['id'])->update($data);
                if ($res) {
                    $this->success('修改成功', 'Goods/goods_list');
                } else {
                    $this->error('修改失败', url('Goods/goods_edit', 'id=' . $data['id']));
                }
            }

    }

    public function goods_del()
    {
        $id = input('id');
        $img = Db::query('select g.imgid,i.* from zjb_goods as g,zjb_img as i WHERE g.imgid=i.id and g.id='.$id);
        $url = ROOT_PATH . 'public/static/admin/uploads/' . $img[0]['imgpath'] . '/' . $img[0]['imgname'];
        /*图片删除*/
        unlink($url);
        $res = Db::query('delete g.*,i.* from zjb_goods as g,zjb_img as i WHERE g.imgid=i.id and g.id='.$id);
        if($res){
            $this->success('删除成功','Goods/goods_list');
        }else{
            $this->error('删除失败','Goods/goods_list');
        }
    }

    public function goods_status_edit($id,$status)
    {
        if($status == 0){
            $res = Db::name('goods')->where('id',$id)->setField('goods_status',1);
        }else{
            $res = Db::name('goods')->where('id',$id)->setField('goods_status',0);
        }
        if ($res) {
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }

    public function goods_cate()
    {
        $goods_cate =Db::name('goods_cate')->select();
        foreach ($goods_cate as $k=>$v){
            if ($v['pid']==0){
                $v['pid'] = $v['catename'];
                $arr[] = $v;
            }else{
                $str = Db::name('goods_cate')->where('id',$v['pid'])->value('catename');
                $v['pid'] = $str;
                $arr[] = $v;
            }
        }
        //$arr：未分页的数据  2：每页显示的记录数
        $arr1 =new Page($arr,10);
        $this->assign(['cate'=>$arr1]);
        return $this->fetch('goods_cate');
   }

    public function goods_cate_add()
    {
        $goods_cate = Db::name('goods_cate')->select();
        $arr = $this->GetTree($goods_cate,0,0);
        $this->assign('cate_array',$arr);
        return view('goods_cate_add');
   }

    private function GetTree($arr,$pid,$step){
        global $tree;
        foreach($arr as $key=>$val) {
            if($val['pid'] == $pid) {
                $nbsp =str_repeat('&nbsp;',$step*4);
                $flg = str_repeat('|―',1);
                $val['catename'] = $nbsp.$flg.$val['catename'];
                $tree[] = $val;
                $this->GetTree($arr , $val['id'] ,$step+1);
            }
        }
        return $tree;
    }
    private function GetParCate($arr,$pid,$step){
        global $tree;
        foreach($arr as $key=>$val) {
            if($val['pid'] == $pid) {
                $pName = Db::name('goods_cate')->where('id',$val['pid'])->value('catename');
                $val['pid'] =$pName;
                $tree[] = $val;
                $this->GetParCate($arr , $val['id'] ,$step+1);
            }
        }
        return $tree;
    }

    public function goods_cate_added()
    {
        $data = $_POST;
        $path =Db::name('goods_cate')->where('id',$data['pid'])->value('path');
        $data['path']=$path.','.$data['pid'];
        $res = Db::name('goods_cate')->insert($data);
        if ($res){
            $this->success('添加成功','Goods/goods_cate',$res);//第三个值为信息值可以当做判断参数
        }else{
            $this->error('添加失败','Goods/goods_cate_add',$res);
        }
    }
}