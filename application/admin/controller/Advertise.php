<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Paginator;

class Advertise extends Controller{

    public function advertise_list(){
    	//广告列表
        $list = Db::table('zjb_advertises')->paginate(10);
        $page = $list->render();

        $type = Db::table('zjb_advertise_type')->select();
        // var_dump($type['id']);die;
        $this->assign('type',$type);
        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('advertise_list');
    }

    public function advertise_search(){
        // 搜索框
        $title = input('title');
        if(!empty($title)){
                $list = Db::table('zjb_advertises')->where('title','like','%'.$title.'%')->paginate(10);
                $page = $list->render();
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Advertise/advertise_list')."';</script>");
        }
        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('advertise_list');
    }

    public function advertise_add(){
    	//添加页面
        //查询 显示赋值  按照path id 
        $data = Db::query("select *,concat(path,',',id) as paths FROM zjb_advertise_type order by paths;");
        //处理数据
        foreach($data as $k=>$v){
            $arr = explode(',',$v['paths']);
            $num = count($arr)-2;
            $data[$k]['typename'] = str_repeat('|----',$num).$v['typename'];
        }
        $this->assign('data',$data); //
        return view('advertise_add');
    }

    public function advertise_insert(){
        //执行添加
        $data = input();
        $file = request()->file('images');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $imgName = date('YmdHis').rand(10000,99999);
            $info = $file->validate(['size'=>3150000,'ext'=>'jpg,png,gif,rgb'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads'.'/'.date('Ymd'),$imgName);
            if($info){
                 //自定义存储的img名称
                $data['images'] = date('Ymd').'/'.$info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        $res = Db::table('zjb_advertises')->insert($data);
         if($res){
            die("<script>alert('添加成功');window.location.href='".url('Advertise/advertise_list')."';</script>");
        }else{
            die("<script>alert('添加失败');window.location.href='".url('Advertise/advertise_list')."';</script>");
         }
    }

    public function advertise_edit(){
    	//修改页面  
        $id = input('id');
        $res = Db::table('zjb_advertises')->where('id',$id)->find();

        $this->assign('advertises',$res);
        return view('advertise_edit');
    }

    public function advertise_modify(){
        //执行修改
        $data = input();
        $id = input('id');

        $file = request()->file('images');
        if($file){
            $imgName = date('YmdHis').rand(10000,99999);
            $info = $file->validate(['size'=>3150000,'ext'=>'jpg,png,gif,rgb'])->move(ROOT_PATH . 'public/static/admin' . DS . 'uploads'.'/'.date('Ymd'),$imgName);
            if($info){
                 //自定义存储的img名称
                $data['images'] = date('Ymd').'/'.$info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $res = Db::table('zjb_advertises')->where('id', $id)->update($data);
        if($res){
            die("<script>alert('11');window.location.href='".url('Advertise/advertise_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Advertise/advertise_list')."';</script>");
        } 
    }

    public function advertise_delete(){
        //执行删除
        $id = input('id');
        $res = Db::table('zjb_advertises')->where('id',$id)->delete();
        if($res){
            die("<script>alert('11');window.location.href='".url('Advertise/advertise_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Advertise/advertise_list')."';</script>");
        } 
    }

    public function advertise_see(){
        //查看页面  
        $id = input('id');
        $res = Db::table('zjb_advertises')->where('id',$id)->find();

        $this->assign('advertises',$res);
        return view('advertise_see');
    }

    public function advertise_status(){
        //启用--
        $id = input('id');
        $data =  Db::table('zjb_advertises')->where('id', $id)->find();

        if($data['status'] == 0){
            $res = Db::table('zjb_advertises')->where('id', $id)->update(['status' => '1']);
        }else{
            $res = Db::table('zjb_advertises')->where('id', $id)->update(['status' => '0']);
        }

        if($res){
            die("<script>;window.location.href='".url('Advertise/advertise_list')."';</script>");
        }else{
            die("<script>alert('启用失败');window.location.href='".url('Advertise/advertise_list')."';</script>");
        } 
    }

    //-------------------------------------分类----------------------------------//


    public function advertise_type_list(){
        // 分类管理 列表
        $list = Db::table('zjb_advertise_type')->paginate(10);
        $page = $list->render();
        // $arr = json_decode(json_encode($list),true);

        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('advertise_type_list');
    }

    public function advertise_type_add(){
        //添加页面
        //查询 显示赋值  按照path id 
        $data = Db::query("select *,concat(path,',',id) as paths FROM zjb_advertise_type order by paths;");
        //处理数据
        foreach($data as $k=>$v){
            $arr = explode(',',$v['paths']);
            $num = count($arr)-2;
            $data[$k]['typename'] = str_repeat('|----',$num).$v['typename'];
        }
        $this->assign('data',$data);
        return view('advertise_type_add');
    }

    public function advertise_type_insert(){
        //执行添加
        $data = input();
        // 判断是否 是顶级分类
        if($data['aid'] == 0){
            $data['path'] = 0;
        }else{
            //按父类 id 查询
            $id = Db::table('zjb_advertise_type')->where('id',$data['aid'])->find();
            //拼接path 保存
            $data['path'] = $id['path'].','.$id['id'];
            $data['aid'] = $id['id'];
        }
        $res = Db::table('zjb_advertise_type')->insert($data);

        if($res){
            die("<script>alert('11');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
         }
    }

    public function advertise_type_see(){
        //查看页面  
        $id = input('id');
        // 本级分类名
        $res = Db::table('zjb_advertise_type')->where('id',$id)->find();
        // 上级分类名 根据本类 的aid查询上级
        $data = Db::table('zjb_advertise_type')->where('id',$res['aid'])->find();

        $this->assign('type',$res);
        $this->assign('data',$data);

        return view('advertise_type_see');
    }

    public function advertise_type_edit(){
        //修改页面  
        $id = input('id');
        $res = Db::table('zjb_advertise_type')->where('id',$id)->find();
        
        $this->assign('type',$res);
        return view('advertise_type_edit');
    }

    public function advertise_type_modify(){
        //执行修改
        $data = input();
        $id = input('id');

        $res = Db::table('zjb_advertise_type')->where('id', $id)->update($data);
        if($res){
            die("<script>alert('11');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        } 
    }

    public function advertise_type_delete(){
        //执行删除
        $id = input('id');
        //根据 id 模糊删除所有二级以上子分类
        $data = Db::table('zjb_advertise_type')->where('path','like','%'.','.$id.','.'%')->delete();
        // 删除本身和其一级子分类
        $res = Db::table('zjb_advertise_type')->where('id',$id)->whereOr('aid',$id)->delete();
        if($res){
            die("<script>alert('11');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        }else{
            die("<script>alert('22');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        }
    }

    public function advertise_type_search(){
        // 搜索框
        $typename = input('typename');
        if(!empty($typename)){
                $list = Db::table('zjb_advertise_type')->where('typename','like','%'.$typename.'%')->paginate(10);
                $page = $list->render();
        }else{
            die("<script>alert('请填写搜索信息');window.location.href='".url('Advertise/advertise_type_list')."';</script>");
        }
        $this->assign('page', $page);
        $this->assign('list', $list);

        return view('advertise_type_list');
    }

}
