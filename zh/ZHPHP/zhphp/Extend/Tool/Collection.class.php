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

class collection {
		
	protected static $url,$config;
    
    /**
	 * 采集内容
	 * @param string $url    采集地址
	 * @param array $config  配置参数
	 * @param integer $page  分页采集模式
	 */
	public static function get_content($url, $config, $page = 0) {
        set_time_limit(300);
        static $oldurl = array();
        $page = intval($page) ? intval($page) : 0;
        //p($url);die;
        if ($html = self::get_html($url, $config)) {
            if (empty($page)) {
                //echo $config['title_rule'];die;
                //获取标题
                if ($config['title_rule']) {
                   $title_rule = self::replace_sg($config['title_rule']);
                   $data['title'] = self::replace_item(self::cut_html($html, $title_rule[0], $title_rule[1]), $config['title_html_rule']);
                }
                //获取作者
    			if ($config['author_rule']) {
    				$author_rule =  self::replace_sg($config['author_rule']);
    				$data['author'] = self::replace_item(self::cut_html($html, $author_rule[0], $author_rule[1]), $config['author_html_rule']);
    			}
    			
    			//获取来源
    			if ($config['comeform_rule']) {
    				$comeform_rule =  self::replace_sg($config['comeform_rule']);
    				$data['comeform'] = self::replace_item(self::cut_html($html, $comeform_rule[0], $comeform_rule[1]), $config['comeform_html_rule']);
    			}
    			
    			//获取时间
    			if ($config['time_rule']) {
    				$time_rule =  self::replace_sg($config['time_rule']);
    				$data['time'] = strtotime(self::replace_item(self::cut_html($html, $time_rule[0], $time_rule[1]), $config['time_html_rule']));
    			}
                
                if (empty($data['comeform'])) $data['comeform'] = $config['name'];
                if (empty($data['time'])) $data['time'] = time();
                
                //对自定义数据进行采集
    			if ($config['customize_config'] = string2array($config['customize_config'])) {
    			     $ext = 'gif|jpg|jpeg|bmp|png';
    			    $upload_root = ROOT_PATH.'upload/';
                    $upload_url = __HOST__.'/upload/';//pc_base::load_config('system','upload_url');
                    $dir = date('Y/md/');
                    $uploadpath = $upload_url.$dir;
                    $uploaddir = $upload_root.$dir;
                    $downloadedfilearr=array();
    				foreach ($config['customize_config'] as $k=>$v) {
    					if (empty($v['rule'])) continue;
    					$rule =  self::replace_sg($v['rule']);
                        if($v['is_preg']== "1"){
                            $flag=preg_match_all($v['rule'], $html, $matches1);
                            //echo $v['en_name'];
       
                            if($flag){
                                if(!empty($v['preg_index'])){
                                $data[$v['en_name']]=$matches1[$v['preg_index']][0];
                                }else{
                                    if(isset($matches1[1])){
                                        $data[$v['en_name']]=$matches1[1][0];
                                    }else{
                                         $data[$v['en_name']]="";
                                    }
                                }
                            }else{
                                $data[$v['en_name']]="";
                            }
                            
                            
                        }else{
                            /*if($v['en_name']=='enterprise_tag'){
                                p($rule);
                                echo self::cut_html($html, $rule[0], $rule[1]);die;
                            }*/
                            $data[$v['en_name']] = self::replace_item(self::cut_html($html, $rule[0], $rule[1]), $v['html_rule']);
                        }
    					
                        if($v['is_image'] == "1" ){
                      
                            $file=$data[$v['en_name']];
                            //p($file);die;
                            dir_create($uploaddir);
                            $fileext = fileext($file);
                            //$ext = 'gif|jpg|jpeg|bmp|png';
                            if($fileext=='gif' || $fileext=='jpg' || $fileext=='jpeg' || $fileext=='bmp' || $fileext=='png'){
                                $file_name = basename($file);
                                $filename =date('Ymdhis').rand(100, 999).'.'.$fileext;
                                $newfile = $uploaddir.$filename;
                                if(copy($file, $newfile)) {
                                    @chmod($newfile, 0777);
                                    $fileext = fileext($filename);
                                    $filepath = $dir.$filename;
                                    $data[$v['en_name']]=$filepath;
                                }
                            }else{
                                $contentType=self::getFileMime($file);
                                switch($contentType){
                                    case 'image/gif':
                                        $fileext='gif';
                                    case 'image/jpeg':
                                        $fileext='jpg';
                                    case 'application/x-bmp':
                                        $fileext='bmp';
                                    case 'image/png':
                                        $fileext='png';
                                }
                                if($fileext=='gif' || $fileext=='jpg' || $fileext=='jpeg' || $fileext=='bmp' || $fileext=='png'){
                                    $file_name = basename($file);
                                    $filename =date('Ymdhis').rand(100, 999).'.'.$fileext;
                                    $newfile = $uploaddir.$filename;
                                    if(copy($file, $newfile)) {
                                        @chmod($newfile, 0777);
                                        $fileext = fileext($filename);
                                        $filepath = $dir.$filename;
                                        $data[$v['en_name']]=$filepath;
                                    }
                                }
                                //p($fileext);die;
                            }
                            
                            /*if(preg_match_all("/(href|src)=([\"|']?)([^ \"'>]+\.($ext))\\2/i", $data[$v['en_name']], $matches)){
                                $remotefileurls = array();
                                foreach($matches[3] as $matche){
                                    if(strpos($matche, '://') === false) continue;
                                    dir_create($uploaddir);
                                    $remotefileurls[$matche] = $matche;
                                }
                                $remotefileurls = array_unique($remotefileurls);
                                $oldpath = $newpath = array();
                                //$image_index=0;
                                foreach($remotefileurls as $k=>$file) {
                                    if(strpos($file, '://') === false || strpos($file, $upload_url) !== false) continue;
                                    $filename = fileext($file);
                                    $file_name = basename($file);
                                    $filename =date('Ymdhis').rand(100, 999).'.'.$filename;
                                    $newfile = $uploaddir.$filename;
                                    if(copy($file, $newfile)) {
                                        @chmod($newfile, 0777);
                                        $fileext = fileext($filename);
                                        $filepath = $dir.$filename;
                                        $downloadedfile = array(
                                            'filename'=>$filename, 
                                            'filepath'=>$filepath, 
                                            'filesize'=>filesize($newfile), 
                                            'fileext'=>$fileext);
                                        $downloadedfilearr[]=$downloadedfile;
                                    }
                                   	//$data[$v['en_name']]['image']=array2string($downloadedfile);
                                }
                                $data[$v['en_name'].'_images']=array2string($downloadedfilearr);
                            } */
                            
                        }
    				}
    			}
            }
            //获取内容
			if ($config['content_rule']) {
				$content_rule =  self::replace_sg($config['content_rule']);
				$data['content'] = self::replace_item(self::cut_html($html, $content_rule[0], $content_rule[1]), $config['content_html_rule']);
			}
            //if (empty($data['content'])) $data['content'] = "";
            //处理分页
			if (in_array($page, array(0,2)) && !empty($config['content_page_start']) && !empty($config['content_page_end'])) {
			   echo __FILE__.'TODO--之后处理分页__1';die;
			}
            //p($data);
            if ($page == 0) {
                /*self::$url = $url;
				self::$config = $config;
                $data['content'] = preg_replace('/<img[^>]*src=[\'"]?([^>\'"\s]*)[\'"]?[^>]*>/ie', "self::download_img('$0', '$1')", $data['content']);
                //下载内容中的图片到本地
				if (empty($page) && !empty($data['content']) && $config['down_attachment'] == 1) {
				    $attachment = new Cattachment('collection','0','0');
                    $data['content'] = $attachment->download('content', $data['content'],$config['watermark']);
				}*/
                
            }
            return $data;
        }
	}
    
    protected static function getFileMime($url){
         $url = parse_url($url);
         if($fp = @fsockopen($url['host'],empty($url['port'])?80:$url['port'],$error)){
                 fputs($fp,"GET ".(empty($url['path'])?’/’:$url['path'])." HTTP/1.1\r\n");
                 fputs($fp,"Host:$url[host]\r\n\r\n");
                 while(!feof($fp)){
                         $tmp = fgets($fp);
                         if(trim($tmp) == ''){
                                 break;
                         }else if(preg_match('/Content-Type:(.*)/si',$tmp,$arr)){
                                 return trim($arr[1]);
                         }
                 }
                 return null;
         }else{
                 return null;
         }
    } 
    
    /**
	 * 转换图片地址为绝对路径，为下载做准备。
	 * @param array $out 图片地址
	 */
	protected static function download_img($old, $out) {
	   /*echo '$old:'.$old.'<br/>';
       echo '$out:'.$out.'<br/>';*/
       //p($out);
		if (!empty($old) && !empty($out) && strpos($out, '://') === false) {
			return str_replace($out, self::url_check($out, self::$url, self::$config), $old);
		} else {
			return $old;
		}
	}
    
    /**
	 * 过滤代码
	 * @param string $html  HTML代码
	 * @param array $config 过滤配置
	 */
	protected static function replace_item($html, $config) {
	   
	       //p($html);
        if (empty($config)) return $html;
        $config = explode("\n", $config);
        $patterns = $replace = array();
        $p = 0;
        //p($html);
        foreach ($config as $k=>$v) {
            if (empty($v)) continue;
            $c = explode('[|]', $v);
            $patterns[$k] = '/'.str_replace('/', '\/', $c[0]).'/i';
			$replace[$k] = $c[1];
			$p = 1;
        }
       // p($replace);die;
        return $p ? @preg_replace($patterns, $replace, $html) : false;
	}
    
    /**
	 * 替换采集内容
	 * @param $html 采集规则
	 */
	protected static function replace_sg($html) {
		$list = explode('[content]', $html);
		if (is_array($list)) foreach ($list as $k=>$v) {
			$list[$k] = str_replace(array("\r", "\n"), '', trim($v));
		}
		return $list;
	}
 
    /**
	 * 得到需要采集的网页列表页
	 * @param array $config 配置参数
	 * @param integer $num  返回数
	 */
	public static function url_list(&$config, $num = '') {
		$url = array();
        switch ($config['sourcetype']) {
            case '1'://序列化
				$num = empty($num) ? $config['pagesize_end'] : $num;
				for ($i = $config['pagesize_start']; $i <= $num; $i = $i + $config['par_num']) {
					$url[$i] = str_replace('(*)', $i, $config['urlpage']);
				}
				break;
			case '2'://多网址
				$url = explode("\r\n", $config['urlpage']);
				break;
			case '3'://单一网址
			case '4'://RSS
				$url[] = $config['urlpage'];
				break;
        }
        return $url;
    }
    
    /**
	 * 获取文章网址
	 * @param string $url           采集地址
	 * @param array $config         配置
	 */
	public static function get_url_lists($url, &$config) {
	   if ($html = self::get_html($url, $config)) {
	       if ($config['sourcetype'] == 4) { //RSS
            
           }else {
            header("Content-type:text/html;charset=utf-8");
                $html = self::cut_html($html, $config['url_start'], $config['url_end']);
                //p($html);die;
                $html = str_replace(array("\r", "\n"), '', $html);
                $html = str_replace(array("</a>", "</A>"), "</a>\n", $html);
                preg_match_all('/<a([^>]*)>([^\/a>].*)?<\/a>/i', $html, $out);
                //preg_match_all('/<a([^>]*)><\/a>/i', $html, $out2);
                //p($out);die;
                $out[1] = array_unique($out[1]);
				$out[2] = array_unique($out[2]);
                $data = array();
                foreach ($out[1] as $k=>$v) {
                    if (preg_match('/href=[\'"]?([^\'" ]*)[\'"]?/i', $v, $match_out)) {
                        if ($config['url_contain']) {
							if (strpos($match_out[1], $config['url_contain']) === false) {
								continue;
							} 
						}
                        if ($config['url_except']) {
							if (strpos($match_out[1], $config['url_except']) !== false) {
								continue;
							} 
						}
                        $url2 = $match_out[1];
                        //p($match_out);
                        $url2 = self::url_check($url2, $url, $config);
                        $data[$k]['url'] = $url2;
                        if(isset($out[2][$k])){
                            $data[$k]['title'] = strip_tags($out[2][$k]);
                        }else{
                            $data[$k]['title'] ="";
                        }
						
                        
                        
                    }else {
						continue;
					}
                }
           }
           return $data;
	   }else{
	       return false;
	   }
       
	}
    
    /**
	 * 
	 * HTML切取
	 * @param string $html    要进入切取的HTML代码
	 * @param string $start   开始
	 * @param string $end     结束
	 */
	protected static function cut_html($html, $start, $end) {
		if (empty($html)) return false;
		$html = str_replace(array("\r", "\n"), "", $html);
		$start = str_replace(array("\r", "\n"), "", $start);
		$end = str_replace(array("\r", "\n"), "", $end);
		$html = explode(trim($start), $html);
        
        //p($html);
        //p(count($html));
        //echo count($html).'<br/>';
        if(count($html)!=2){
            return '';
        }
        //p($html);
		if(is_array($html)){
            $html = explode(trim($end), $html[1]);
		} 
        //p($html[0]);
		return $html[0];
	}
    
    /**
	 * 获取远程HTML
	 * @param string $url    获取地址
	 * @param array $config  配置
	 */
	protected static function get_html($url, &$config) {
		if (!empty($url) && $html = @file_get_contents($url)) {
		    $syscharset=C('CHARSET');
		  //p($config);die;
			if ($syscharset != $config['sourcecharset'] && $config['sourcetype'] != 4) {
				$html = iconv($config['sourcecharset'], C('CHARSET').'//TRANSLIT', $html);
			}
			return $html;
		} else {
			return false;
		}
	}
    
    /**
	 * URL地址检查
	 * @param string $url      需要检查的URL
	 * @param string $baseurl  基本URL
	 * @param array $config    配置信息
	 */
	protected static function url_check($url, $baseurl, $config) {
	    //p($baseurl);
		$urlinfo = parse_url($baseurl);
		//p($urlinfo);
		$baseurl = $urlinfo['scheme'].'://'.$urlinfo['host'].(substr($urlinfo['path'], -1, 1) === '/' ? substr($urlinfo['path'], 0, -1) : str_replace('\\', '/', dirname($urlinfo['path']))).'/';
		//p($baseurl);
        //p($url);
        //p('----------------');
        if (strpos($url, '://') === false) {
			if ($url[0] == '/') {
				$url = $urlinfo['scheme'].'://'.$urlinfo['host'].$url;
			} else {
				if ($config['page_base']) {
					$url = $config['page_base'].$url;
				} else {
					$url = $baseurl.$url;
				}
			}
		}
		return $url;
	}
 
 }