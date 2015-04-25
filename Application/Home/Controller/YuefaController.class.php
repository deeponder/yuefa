<?php

namespace Home\Controller;
use Think\Controller;
class YuefaController extends Controller {
	//首页/美发照片展示
		public function index(){
			$hlist = M('hairs','yf_','DB_CONFIG1')->order('likes desc')->limit(6)->select();

			$this->hlist = $hlist;
			$this->display();
			// dump($hlist);
			// echo "hello weiphp";
		}

	//加载更多
		public function getmore(){
			$page = I('get.page');
			$num = 6;
			$hairs = M('hairs','yf_','DB_CONFIG1');	
			$result = $hairs->order('likes desc')->limit($page*$num,$num)->select();

			$this->ajaxReturn($result,'JSON');


		}
	//点赞处理函数
		public function dolike(){
			$id = I('get.id');
			$map['id'] = $id;
			$result =  M('hairs','yf_','DB_CONFIG1')->where($map)->select();
			$data['likes'] = $result[0]['likes']+1;
			M('hairs','yf_','DB_CONFIG1')->where($map)->setField($data);
		}

	//理发师详情页
		public function barber(){
			$bid = I('get.bid');
			// dump('hel');
			$bmap['id'] = $bid;
			$hmap['belong'] = $bid;
			$barber = M('barber','yf_','DB_CONFIG1')->where($bmap)->select();
			$hlist = M('hairs','yf_','DB_CONFIG1')->where($hmap)->select();
			$this->barber = $barber;
			$this->hlist = $hlist;
			// dump($barber);
			$this->display();
		}	

		//分类显示
		public function cate(){
			$select1=I('get.select1');
			$select2=I('get.select2');
			$flag = 1;
			if($select1!='2'&&$select2!='所有'){
				$map['gender'] = $select1;
				$map['type'] = $select2;
			}elseif($select1!='2'){
				$map['gender'] = $select1;
			}elseif($select2!='所有'){
				$map['type'] = $select2;
			}else{
				$flag =0;
			}
			if(!flag){
				$result=M('hairs','yf_','DB_CONFIG1')->order('likes desc')->select();
			}else{
				$result=M('hairs','yf_','DB_CONFIG1')->where($map)->order('likes desc')->select();
			}
			$this->ajaxReturn($result,'JSON');


		}

}

