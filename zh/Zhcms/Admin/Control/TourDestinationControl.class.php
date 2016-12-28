<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class TourDestinationControl extends AuthControl {
    protected $db;
    
    public function __init() {
		//$this -> db = K("Destinations");
	}
    
	//商品类型一览
	public function destination() {
	    $db_prefix=C("DB_PREFIX");
        $tourModelModel=K('TourModel');   
        $tourDestinationsModel=K("TourDestinations");
        
        $action=Q('action');
        
        if(empty($action))
        {
            $typeid=Q('typeid');
            $typeid=empty($typeid)?0:$typeid;
            if(!empty($typeid))
            {
                echo __FILE__.'destination--1';die;
                $moduleinfo =$tourModelModel->find($typeid);
                $product_dest_table=$moduleinfo['pinyin'].'_kindlist';
            }
            $addmodule =$tourModelModel->where("id>13")->All();//->get_all(); //扩展模型
            foreach ($addmodule as $addmodulekey => $addmoduleval)
            {
                if ($addmoduleval['pinyin'] == 'dingzhi' || $addmoduleval['pinyin'] == 'notes')
                    unset($addmodule[$addmodulekey]);
            }
            $allmodule=$tourModelModel->getAllModule();
            
            $position = $typeid == 0 ? '全体目的地' : $moduleinfo['modulename'] . '目的地';
            
            $this->assign('typeid',$typeid);
            $this->assign('position', $position);
            $this->assign('addmodule', $addmodule);
            $this->assign('allmodule', $allmodule);
            $this->display('destination');
        }else if($action == 'read'){
            $node=Q('node');
		    $typeid=Q('typeid');
		    $node_arr=explode('_',$node);
            if(!empty($typeid))
            {
                echo __FILE__.'destination--read1';die;
                $moduleinfo =$tourModelModel->find($typeid);
                $product_dest_table=$db_prefix.$moduleinfo['pinyin'].'_kindlist';
            }
            $pid=$node_arr[1]=='root'?0:$node_arr[1];
            if(empty($typeid))
            {
                $sql="select * from ".$db_prefix."tour_destinations where pid=$pid";
            }else
            {
                echo __FILE__.'destination--read2';die;
                $bfields = 'b.kindid,b.seotitle,b.keyword,b.description,b.tagword,b.jieshao,b.isfinishseo,b.isnav,b.ishot,b.displayorder';
                $sql="select a.id,a.kindname,a.isopen,a.pinyin,a.iswebsite,{$bfields} from {$db_prefix}destinations a left join $product_dest_table b on a.id=b.kindid where a.pid=$pid  order by case when b.displayorder is null then 9999 end, b.displayorder ";
            }
            $list=M()->query($sql);
            if($typeid==0) //只有主目的地有添加功能.
            {
                $list[]=array(
                   'leaf'=>true,
                   'id'=>$pid.'add',
                   'kindname'=>'<button class="dest-add-btn df-add-btn" onclick="addSub('.$pid.')">新規</button>',
                   'allowDrag'=>false,'allowDrop'=>false,'displayorder'=>'add',
                   'isopen'=>'add',
                   'iswebsite'=>'add',
                   'isnav'=>'add',
                   'istopnav'=>'add',
                   'ishot'=>'add',
                   'pinyin'=>'add'
               );
            }
            echo json_encode(array('success'=>true,'text'=>'','children'=>$list));exit;
        }else if($action == 'addsub'){
            $pid=Q('pid');
            
            $dest=array();
            $dest['pid']=$pid;
            $dest['kindname']='未命名';
            $id=$tourDestinationsModel->add($dest);
            if($id){
                
                echo json_encode($tourDestinationsModel->find($id));exit;
            }
        }else if($action=='save')
        {
            $rawdata=file_get_contents('php://input');
            $field=Q('field');
            $typeid=Q('typeid');
            $current_pinyin = Q('pinyin');
            $data=json_decode($rawdata);
            
            $dest_id_arr=explode('_',$data->id);
            $dest_id=$dest_id_arr[1];
            if(!empty($typeid))
            {
                echo __FILE__.'destination--save1';die;
                $moduleinfo =$tourModelModel->find($typeid);
                $product_dest_table=$moduleinfo['pinyin'].'_kindlist';
            }
            if(!is_numeric($dest_id_arr[1]))
            {
                echo json_encode(array('success'=>false));exit;
            }if($typeid==0)
            {
                $dest=$tourDestinationsModel->find($dest_id_arr[1]);
                if($field)
                {
                    if($field=='kindname')
                    {
                        $dest['pinyin']= empty($current_pinyin) ? TourCommon::getPinYin($data->$field) : $current_pinyin;
                        $tmp_pinyin = $dest['pinyin'];
                        for ($i = 0; $i <= 100; $i++)
                        {
                            if ($i > 0)
                            {
                                $dest['pinyin'] = $tmp_pinyin . $i;
                            }
                            $dest_chk_model=$tourModelModel->where("pinyin='".$dest['pinyin']."' and id!=".$dest['id']."")->find();
                            if(!$dest_chk_model){
                                break;
                            }
                        }
                        $pinyin = $dest['pinyin'];
                    }
                    $dest[$field]=$data->$field;
                }else
                {
                    unset($data->id);
                    unset($data->parentId);
                    unset($data->leaf);
				    unset($data->issel);
				    unset($data->shownum);
                    foreach($data as $k=>$v)
                    {
                       $dest[$k]=$v;
                    }
                }
                
                $dest_chk_model=$tourModelModel->where("pinyin='".$dest['pinyin']."' and id!=".$dest['id']."")->find();
                if(!$dest_chk_model){
                    echo json_encode(array('success'=>false));exit;
                }
                
                
                
            }else{
                echo __FILE__.'destination--save2';die;
                $destModel = M($product_dest_table);
                $dest = $destModel->where("kindid=$dest_id")->find();
                if(!empty($dest))
                {
                   $dest['kindid'] = $dest_id;
                   $dest['displayorder'] = $data->displayorder;
                   $dest['displayorder']=empty($dest['displayorder'])?9999:$dest['displayorder'];
                   $opid=$destModel->where("kindid=$dest_id")->update($dest);
                
                }else
                {
                    unset($data->id);
                    unset($data->parentId);
                    unset($data->leaf);
                    unset($data->kindname);
                    unset($data->isopen);
                    unset($data->iswebsite);
                    unset($data->istopnav);
                    unset($data->pinyin);
                    unset($data->pid);
                    unset($data->kindtype);
                    unset($data->litpic);
                    unset($data->piclist);
                    unset($data->issel);
                    unset($data->shownum);
                    unset($data->templet);
                    foreach($data as $k=>$v)
                    {
                       $dest[$k]=$v;
                    }
                    $dest['kindid'] = $dest_id;
                    $dest['displayorder'] = $data->displayorder;
                    $opid=$destModel->add($dest);
                }
                
                if($opid){
                    echo json_encode(array('success'=>true));
                }else{
                    echo json_encode(array('success'=>false));
                }
                exit;
            }
            $dest['displayorder']=empty($dest['displayorder'])?9999:$dest['displayorder'];
            $id=$tourDestinationsModel->update($dest);
            if($id){
                echo json_encode(array('success'=>true));
            }else{
                echo json_encode(array('success'=>false));
            }
            exit;
        }else if($action=='update'){
            $id=Q('id');
			$field=Q('field');
			$val=Q('val');
			$typeid=Q('typeid');
            if($typeid==0)
            {
                $model=$tourDestinationsModel->find($id);
                $model[$field]=$val;
                if($field == 'weburl')
                {
                    
                }
                $id=$tourDestinationsModel->update($model);
                if($id){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }else{
                $moduleinfo =$tourModelModel->find($typeid);
                $product_dest_table=$moduleinfo['pinyin'].'_kindlist';
                $destM = M($product_dest_table);
                $model=$destM->where("kindid=$id")->find();
                if(empty($model)){
                    $model['kindid'] = $id;
                    $model[$field]=$val;
                    $id=$destM->add($model);
                }else{
                    $model[$field]=$val;
                    $id=$destM->update($model);
                }
                
                
                if($id){
                    echo 'ok';
                }else{
                    echo 'no';
                }
            }
            
            exit;
        }else if($action == 'delete'){
            $rawdata=file_get_contents('php://input');
		    $field=$_GET['field'];//Arr::get($_GET,'field');	
		    $data=json_decode($rawdata);
		    $dest_id_arr=explode('_',$data->id);
		    if(!is_numeric($dest_id_arr[1]))
            {
			   echo json_encode(array('success'=>false));
			   exit;
		    }
		    $dest=$tourDestinationsModel->del($dest_id_arr[1]);// ORM::factory('destinations',$dest_id_arr[1]);
		    exit;
        }else if($action == 'search')
        {
            $keyword=trim(Q('keyword'));
            $searchSql="select id,pid from ".$db_prefix."destinations where kindname like '%{$keyword}%'";
            $list=M()->query($searchSql);
            $new_arr=array();
            if(!empty($list)){
                foreach($list as $k=>$v)
                {
                    $temp_arr = array();
                    if($v['pid']!=0)
                    {
                        $temp_id=$v['pid'];
                        $temp_arr=array($v['pid'],$v['id']);
                        while(true)
                        {
                            $temp_dest=$tourDestinationsModel->find($temp_id);
                            if($temp_dest['pid']!=0)
                            {
                                array_unshift($temp_arr,$temp_dest['pid']);
                                $temp_id=$temp_dest['pid'];
                            }else{
                                break;
                            }
                        }
                        $new_arr[]=$temp_arr;
                    }
                    else{
                        $new_arr[]=array($v['id']);
                    }
                }
            }
            if(empty($new_arr))
            {
                echo 'no';
            }else{
                echo json_encode($new_arr);   	
            }
            exit;
        }else if($action == 'drag')
        {
            $moveid=Q('moveid');
			$overid=Q('overid');
			$position=Q('position');
            $moveDest=$tourDestinationsModel->find($moveid);
		    $overDest=$tourDestinationsModel->find($overid);
            if($position=='append')
            {
                $moveDest['pid']=$overid;
            }else{
                $moveDest['pid']=$overDest['pid'];
            }
            $opid=$tourDestinationsModel->update($moveDest);
            if($opid){
                echo 'ok';
            }else{
                echo 'no';
            }
            exit;
        }
	}
    
    
}
