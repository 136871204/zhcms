<?php
if (!defined("ZHPHP_PATH"))
	exit('No direct script access allowed');
//.-----------------------------------------------------------------------------------
// |  Software: [ZHPHP framework]
// |   Version: 2014.06
// |-----------------------------------------------------------------------------------
// |    Author: 周鸿 <136871204@qq.com>
// | Copyright (c) 2014, 周鸿 <136871204@qq.com>.All Rights Reserved.
// '-----------------------------------------------------------------------------------

class Cattachment {
    var $contentid;
	var $module;
	var $catid;
	var $attachments;
	var $field;
	var $imageexts = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
	var $uploadedfiles = array();
	var $downloadedfiles = array();
	var $error;
	var $upload_root;
	var $siteid;
	var $site = array();
    //$attachment = new attachment('collection','0','1');
    function __construct($module='', $catid = 0,$siteid = 0,$upload_dir = '') {
        $this->catid = intval($catid);
        $this->siteid = intval($siteid)== 0 ? 1 : intval($siteid);
        $this->module = $module ? $module : 'content';
        $this->upload_root = ROOT_PATH.'upload/';
        $this->upload_dir = $upload_dir;
        $this->upload_func = 'copy';
    }
    
    /**
	 * 附件下载
	 * Enter description here ...
	 * @param $field 预留字段
	 * @param $value 传入下载内容
	 * @param $watermark 是否加入水印
	 * @param $ext 下载扩展名
	 * @param $absurl 绝对路径
	 * @param $basehref 
     * $data['content'] = $attachment->download('content', $data['content'],$config['watermark']);
	 */
	function download($field, $value,$watermark = '0',$ext = 'gif|jpg|jpeg|bmp|png', $absurl = '', $basehref = ''){
	   $this->field = $field;
       $dir = date('Y/md/');
       $upload_url = __HOST__.'/upload/';//pc_base::load_config('system','upload_url');
       $uploadpath = $upload_url.$dir;
       $uploaddir = $this->upload_root.$dir;
       $string = new_stripslashes($value);
       if(!preg_match_all("/(href|src)=([\"|']?)([^ \"'>]+\.($ext))\\2/i", $string, $matches)) return $value;
       $remotefileurls = array();
       foreach($matches[3] as $matche)
        {
        	if(strpos($matche, '://') === false) continue;
            //p($uploaddir);die;
        	dir_create($uploaddir);
        	$remotefileurls[$matche] = $this->fillurl($matche, $absurl, $basehref);
        }
        unset($matches, $string);
        $remotefileurls = array_unique($remotefileurls);
        $oldpath = $newpath = array();
        foreach($remotefileurls as $k=>$file) {
            if(strpos($file, '://') === false || strpos($file, $upload_url) !== false) continue;
            $filename = fileext($file);
            $file_name = basename($file);
            $filename = $this->getname($filename);
            
            $newfile = $uploaddir.$filename;
            $upload_func = $this->upload_func;
            if($upload_func($file, $newfile)) {
                $oldpath[] = $k;
                $GLOBALS['downloadfiles'][] = $newpath[] = $uploadpath.$filename;
                @chmod($newfile, 0777);
                $fileext = fileext($filename);
                /*if($watermark){
					watermark($newfile, $newfile,$this->siteid);
				}*/
                $filepath = $dir.$filename;
                $downloadedfile = array(
                                    'filename'=>$filename, 
                                    'filepath'=>$filepath, 
                                    'filesize'=>filesize($newfile), 
                                    'fileext'=>$fileext);
            }
            
        }
        return str_replace($oldpath, $newpath, $value);
	}
    
    /**
	 * 获取附件名称
	 * @param $fileext 附件扩展名
	 */
	function getname($fileext){
		return date('Ymdhis').rand(100, 999).'.'.$fileext;
	}
    
    /**
	* 补全网址
	*
	* @param	string	$surl		源地址
	* @param	string	$absurl		相对地址
	* @param	string	$basehref	网址
	* @return	string	网址
	*/
	function fillurl($surl, $absurl, $basehref = '') {
	   if($basehref != '') {
            echo __FILE__.'fillurl__1';die;
	       /*
			$preurl = strtolower(substr($surl,0,6));
			if($preurl=='http://' || $preurl=='ftp://' ||$preurl=='mms://' || $preurl=='rtsp://' || $preurl=='thunde' || $preurl=='emule://'|| $preurl=='ed2k://')
			return  $surl;
			else
			return $basehref.'/'.$surl;*/
		}
        $i = 0;
		$dstr = '';
		$pstr = '';
		$okurl = '';
		$pathStep = 0;
		$surl = trim($surl);
        if($surl=='') return '';
         $site_url=(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
		$urls = @parse_url($site_url);
        if(isset($urls['host'])){
            $HomeUrl = $urls['host'];
        }else{
            $HomeUrl = '';
        }
        $BaseUrlPath = $HomeUrl.$urls['path'];
        $BaseUrlPath = preg_replace("/\/([^\/]*)\.(.*)$/",'/',$BaseUrlPath);
		$BaseUrlPath = preg_replace("/\/$/",'',$BaseUrlPath);
		$pos = strpos($surl,'#');
        if($pos>0) $surl = substr($surl,0,$pos);
        if($surl[0]=='/') {
			$okurl = 'http://'.$HomeUrl.'/'.$surl;
		} elseif($surl[0] == '.') {
			if(strlen($surl)<=2) return '';
			elseif($surl[0]=='/') {
				$okurl = 'http://'.$BaseUrlPath.'/'.substr($surl,2,strlen($surl)-2);
			} else {
				$urls = explode('/',$surl);
				foreach($urls as $u) {
					if($u=="..") $pathStep++;
					else if($i<count($urls)-1) $dstr .= $urls[$i].'/';
					else $dstr .= $urls[$i];
					$i++;
				}
				$urls = explode('/', $BaseUrlPath);
				if(count($urls) <= $pathStep)
				return '';
				else {
					$pstr = 'http://';
					for($i=0;$i<count($urls)-$pathStep;$i++) {
						$pstr .= $urls[$i].'/';
					}
					$okurl = $pstr.$dstr;
				}
			}
		} else {
			$preurl = strtolower(substr($surl,0,6));
			if(strlen($surl)<7)
			$okurl = 'http://'.$BaseUrlPath.'/'.$surl;
			elseif($preurl=="http:/"||$preurl=='ftp://' ||$preurl=='mms://' || $preurl=="rtsp://" || $preurl=='thunde' || $preurl=='emule:'|| $preurl=='ed2k:/')
			$okurl = $surl;
			else
			$okurl = 'http://'.$BaseUrlPath.'/'.$surl;
		}
		$preurl = strtolower(substr($okurl,0,6));
		if($preurl=='ftp://' || $preurl=='mms://' || $preurl=='rtsp://' || $preurl=='thunde' || $preurl=='emule:'|| $preurl=='ed2k:/') {
			return $okurl;
		} else {
			$okurl = preg_replace('/^(http:\/\/)/i','',$okurl);
			$okurl = preg_replace('/\/{1,}/i','/',$okurl);
			return 'http://'.$okurl;
		}
        //p($urls);
	   //p($surl);die;
       
	}
 }