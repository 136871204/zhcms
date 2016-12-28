<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="flowBox">
    <h6><span>收货人信息</span></h6>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport.js"></script>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示国家和地区 -->
            <tr>
                <td bgcolor="#ffffff">配送区域:</td>
                <td colspan="3" bgcolor="#ffffff">
                    <select name="country" id="selCountries_<?php echo $sn;?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[0];?></option>
                        <?php if(is_array($country_list)):?><?php $index=0; ?><?php  foreach($country_list as $country){ ?>
                            <option value="<?php echo $country['region_id'];?>" <?php if($consignee['country'] == $country['region_id']){?>selected<?php }?>><?php echo $country['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="province" id="selProvinces_<?php echo $sn;?>" onchange="region.changed(this, 2, 'selCities_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[1];?></option>
                        <?php if(is_array($province_list[$sn])):?><?php $index=0; ?><?php  foreach($province_list[$sn] as $province){ ?>
                            <option value="<?php echo $province['region_id'];?>" <?php if($consignee['province'] == $province['region_id']){?>selected<?php }?>><?php echo $province['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="city" id="selCities_<?php echo $sn;?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[2];?></option>
                        <?php if(is_array($city_list[$sn])):?><?php $index=0; ?><?php  foreach($city_list[$sn] as $city){ ?>
                            <option value="<?php echo $city['region_id'];?>" <?php if($consignee['city'] == $city['region_id']){?>selected<?php }?>><?php echo $city['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="district" id="selDistricts_<?php echo $sn;?>" <?php if(!$district_list[$sn]){?>style="display:none"<?php }?> style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[3];?></option>
                        <?php if(is_array($district_list[$sn])):?><?php $index=0; ?><?php  foreach($district_list[$sn] as $district){ ?>
                            <option value="<?php echo $district['region_id'];?>" <?php if($consignee['district'] == $district['region_id']){?>selected<?php }?>><?php echo $district['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    (必填)
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">收货人姓名:</td>
            <td bgcolor="#ffffff">
                <input name="consignee" type="text" class="inputBg" id="consignee_<?php echo $sn;?>" value="<?php echo $consignee['consignee'];?>" />
                (必填)
            </td>
            <td bgcolor="#ffffff">电子邮件地址:</td>
            <td bgcolor="#ffffff">
                <input name="email" type="text" class="inputBg"  id="email_<?php echo $sn;?>" value="<?php echo $consignee['email'];?>" />
                (必填)
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示详细地址以及邮政编码 -->
            <tr>
                <td bgcolor="#ffffff">详细地址:</td>
                <td bgcolor="#ffffff">
                    <input name="address" type="text" class="inputBg"  id="address_<?php echo $sn;?>" value="<?php echo $consignee['address'];?>" />
                    (必填)
                </td>
                <td bgcolor="#ffffff">邮政编码:</td>
                <td bgcolor="#ffffff">
                    <input name="zipcode" type="text" class="inputBg"  id="zipcode_<?php echo $sn;?>" value="<?php echo $consignee['zipcode'];?>" />
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">电话:</td>
            <td bgcolor="#ffffff">
                <input name="tel" type="text" class="inputBg"  id="tel_<?php echo $sn;?>" value="<?php echo $consignee['tel'];?>" />
                (必填)
            </td>
            <td bgcolor="#ffffff">手机:</td>
            <td bgcolor="#ffffff">
                <input name="mobile" type="text" class="inputBg"  id="mobile_<?php echo $sn;?>" value="<?php echo $consignee['mobile'];?>" />
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示最佳送货时间及标志行建筑 -->
            <tr>
                <td bgcolor="#ffffff">标志建筑:</td>
                <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"  id="sign_building_<?php echo $sn;?>" value="<?php echo $consignee['sign_building'];?>" /></td>
                <td bgcolor="#ffffff">最佳送货时间:</td>
                <td bgcolor="#ffffff"><input name="best_time" type="text"  class="inputBg" id="best_time_<?php echo $sn;?>" value="<?php echo $consignee['best_time'];?>" /></td>
            </tr>
        <?php }?>
        <tr>
            <td colspan="4" align="center" bgcolor="#ffffff">
                <input type="submit" name="Submit" class="bnt_blue_2" value="配送至这个地址" />
                <?php if($_SESSION['ec_user_id'] > 0 and $consignee['address_id'] > 0){?>
                    <!-- 如果登录了，显示删除按钮 -->
                    <input name="button" type="button" onclick="if (confirm('您确定要删除该收货人信息吗？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_consignee&amp;id=<?php echo $consignee['address_id'];?>'"  class="bnt_blue" value="删除" />
                <?php }?>
                <input type="hidden" name="step" value="consignee" />
                <input type="hidden" name="act" value="checkout" />
                <input name="address_id" type="hidden" value="<?php echo $consignee['address_id'];?>" />
            </td>
        </tr>
    </table>
</div>