<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>问答系统</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    
    
    <js file="__STATIC__/tour/js/jquery-1.8.3.min.js"/>
    <js file="__STATIC__/tour/js/common.js"/>
    <js file="__STATIC__/tour/js/jquery.hotkeys.js"/>
    <js file="__STATIC__/tour/js/msgbox/msgbox.js"/>
    <js file="__STATIC__/tour/js/extjs/ext-all.js"/>
    <js file="__STATIC__/tour/js/extjs/locale/ext-lang-zh_CN.js"/>
    <link type="text/css" href="__STATIC__/tour/js/msgbox/msgbox.css" rel="stylesheet" />
    <link type="text/css" href="__STATIC__/tour/css/common.css" rel="stylesheet"/>
     <link type="text/css" href="__STATIC__/tour/js/msgbox/msgbox.css" rel="stylesheet" />
    <link type="text/css" href="__STATIC__/tour/js/extjs/resources/ext-theme-neptune/ext-theme-neptune-all-debug.css" rel="stylesheet"/>
    <script>
    window.SITEURL =  "__WEB__";
    window.PUBLICURL ="/newtravel/public/";
    window.WEBLIST =  <?php echo json_encode(array_merge(TourCommon::getWebList())); ?> 
    $(function(){
        $.hotkeys.add('f', function(){
                   // parent.window.showIndex(); 
                   //CHOOSE.searchKeyword()
                   search();
                    });
    })
    </script>
    
    <link type="text/css" href="__STATIC__/tour/css/style.css" rel="stylesheet"/>
    <link type="text/css" href="__STATIC__/tour/css/base.css" rel="stylesheet"/>
    <link type="text/css" href="__STATIC__/tour/css/base2.css" rel="stylesheet"/>
    <link type="text/css" href="__STATIC__/tour/css/plist.css" rel="stylesheet"/>   
    <link type="text/css" href="__STATIC__/tour/css/order.css" rel="stylesheet"/>
    
    <script type="text/javascript" src="__STATIC__/tour/js/artDialog/lib/sea.js"></script>

</head>
<body>

    <div class="crumbs" id="dest_crumbs">
        <label>位置：</label>
        订单中心
        &gt; <span>{$position}</span>
        <div class="pro-search">
            <input type="text" id="searchkey" value="订单号/产品名称/联系人" datadef="订单号/产品名称/联系人" class="sty-txt1 set-text-xh wid_200" />
            <input type="button" id="btn_search" value="搜索" onclick="search()" class="sty-btn1 default-btn wid_60" />
        </div>
        
    </div>
    <div class="add_menu-btn" style="border: none">
            <!--<a href="javascript:;" id="addbtn" class="add-btn-class ml-10" style="margin-top: 50px;">添加</a>-->
            <div id="list_ot_web" style="float: left;margin-top: 50px;margin-left: 5px;">

            </div>
            <div id="sellinfo" style="float: left;margin-top: 50px;margin-left: 5px;width:90%">
                <p id="btn" style="float: left">
                    <a href="javascript:;" class="btn_order btn_report" title="查看数据报表">数据报表</a>&nbsp;&nbsp;
                    <a href="javascript:;" class="btn_order btn_excel" title="导出Excel报表">导出Excel</a>
                </p>
                <div id="sell_info_list">
                    <ul>
                      <li>  &nbsp;&nbsp;今日:<span id="today_price">11111</span> &nbsp;&nbsp;</li>
                      <li>| &nbsp;&nbsp;昨日:<span id="last_price">11111</span> &nbsp;&nbsp;</li>
                      <li>| &nbsp;&nbsp;本周:<span id="thisweek_price">11111</span> &nbsp;&nbsp;</li>
                      <li>| &nbsp;&nbsp;本月:<span id="thismonth_price">11111</span> &nbsp;&nbsp;</li>
                      <li>| &nbsp;&nbsp;总销售额:<span id="total_price">11111</span> &nbsp;&nbsp;</li>
                    </ul>
                </div>

            </div>
       </div>
        <div id="product_grid_panel" class="content-nrt"  >

        </div>
<script>

window.display_mode = 1;	//默认显示模式
window.product_kindid = 0;  //默认目的地ID

window.statusmenu=[
    {"status":"0","name":"未处理"},
    {"status":"1","name":"处理中"},
    {"status":"2","name":"交易成功"},
    {"status":"3","name":"取消订单"}
];

Ext.onReady(
    function () {
        Ext.tip.QuickTipManager.init();
        var editico = "<img class='' src='__STATIC__/tour/images/xiugai-ico.gif' />";
        var delico = "<img class='' src='__STATIC__/tour/images/del-ico.gif' />";
        
        $("#searchkey").focusEffect();
        //站点切换
        var web_menu_items=[];
        Ext.Array.each(window.WEBLIST,function(row,index,itself){
            web_menu_items.push({text:row.webname,webid:row.webid});
        });
        
        Ext.create('Ext.button.Cycle',{
            renderTo:'list_ot_web',
            text:'主站',
            showText:true,
            style:"background:#07C3D9",
            menu:{
                items:web_menu_items
            },
            changeHandler: function(cycleBtn, activeItem) {
                if(!window.web_togfirst)
                {
                    window.web_togfirst=1;
                    return;
                }
                window.product_store.getProxy().setExtraParam('webid',activeItem.webid);
                window.product_store.load({start:0});

            }

        });
        
        //产品store
        window.product_store = Ext.create('Ext.data.Store', {

            fields: [
                'id',
                'typeid',
                'ordersn',
                'productname',
                'addtime',
                'usedate',
                'dingnum',
                'price',
                'childprice',
                'childnum',
                'linkman',
                'status'

            ],

            proxy: {
                type: 'ajax',
                api: {
                    read: SITEURL+'?g=Zhcms&a=Admin&c=TourOrder&m=index&action=read&typeid={$typeid}',  //读取数据的URL
                    update: SITEURL+'order/index/action/save/typeid/{$typeid}',
                    destroy: SITEURL+'order/index/action/delete/typeid/{$typeid}'
                },
                reader: {
                    type: 'json',   //获取数据的格式
                    root: 'lists',
                    totalProperty: 'total'
                }
            },

            remoteSort: true,
            pageSize: 30,
            autoLoad: true,
            listeners: {
                load: function (store, records, successful, eOpts) {
                    if(!successful){
                        ST.Util.showMsg("{__('norightmsg')}",5,1000);
                    }

                }
            }

        });

        //产品列表
        window.product_grid = Ext.create('Ext.grid.Panel', {
            store: product_store,
            padding: '2px',
            renderTo: 'product_grid_panel',
            border: 0,
            width: "100%",
            bodyBorder: 0,
            bodyStyle: 'border-width:0px',
            scroll:'vertical', //只要垂直滚动条
                bbar: Ext.create('Ext.toolbar.Paging', {
                store: product_store,  //这个和grid用的store一样
                displayInfo: true,
                emptyMsg: "",
                items: [
                    {
                        xtype: 'combo',
                        fieldLabel: '每页显示数量',
                        width: 170,
                        labelAlign: 'right',
                        forceSelection: true,
                        value: 30,
                        store: {fields: ['num'], data: [
                            {num: 30},
                            {num: 60},
                            {num: 100}
                        ]},
                        displayField: 'num',
                        valueField: 'num',
                        listeners: {
                            select: changeNum
                        }
                    }

                ],

                listeners: {
                    single: true,
                    render: function (bar) {
                        var items = this.items;
                        bar.down('tbfill').hide();

                        bar.insert(0, Ext.create('Ext.panel.Panel', {border: 0, html: '<div class="panel_bar"><a class="abtn" href="javascript:void(0);" onclick="chooseAll()">全选</a><a class="abtn" href="javascript:void(0);" onclick="chooseDiff()">反选</a><a class="abtn" href="javascript:void(0);" onclick="del()">删除</a></div>'}));

                        bar.insert(1, Ext.create('Ext.toolbar.Fill'));
                        //items.add(Ext.create('Ext.toolbar.Fill'));
                    }
                }
            }),
            columns: [
                {
                    text: '选择',
                    width: '5%',
                    // xtype:'templatecolumn',
                    tdCls: 'product-ch',
                    align: 'center',
                    dataIndex: 'id',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {

                        return  "<input type='checkbox' class='product_check' style='cursor:pointer' value='" + value + "'/>";

                    }

                },
                {
                    text: '订单号',
                    width: '10%',
                    dataIndex: 'ordersn',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                        return value;
                    }

                },

                {
                    text: '产品名称',
                    width: '25%',
                    dataIndex: 'productname',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                        return value;
                    }

                },
                {
                    text: '申请日期',
                    width: '10%',
                    dataIndex: 'addtime',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {

                        return value;
                    }

                },
                {
                    text: '使用日期',
                    width: '10%',
                    dataIndex: 'usedate',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                       return value;
                    }

                },
                {
                    text: '预订数量',
                    width: '5%',
                    dataIndex: 'dingnum',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                       return value;

                    }

                },
                {
                    text: '价格(成人)',
                    width: '10%',
                    dataIndex: 'price',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                        return value;

                    }

                },
                {
                    text: '订单状态',
                    width: '8%',
                    dataIndex: 'status',
                    align: 'left',
                    border: 0,
                    sortable: false,
                    renderer: function (value, metadata, record) {
                        var id=record.get('id');
                        if(!isNaN(id))
                        {

                            var html="<select onchange=\"updateField(this,"+id+",'status',0,'select')\"><option>所有</option>";
                           // alert(value);
                            Ext.Array.each(window.statusmenu, function(row, index, itelf) {
                                
                                var is_selected=row.status==value?"selected='selected'":'';
                                html+="<option value='"+row.status+"' "+is_selected+">"+row.name+"</option>";
                            });
                            html+="</select>";
                            return html;

                        }

                    }

                },

                {
                    text: '查看',
                    width: '10%',
                    align: 'center',
                    border: 0,
                    sortable: false,
                    cls: 'mod-1',
                    renderer: function (value, metadata, record) {

                        var id = record.get('id');
                        var typeid = record.get('typeid');
                        var html = "<a href='javascript:void(0);' onclick=\"view(" + id + ","+typeid+")\">"+editico+"</a>";

                        return html;
                        // return getExpandableImage(value, metadata,record);
                    }


                },
                {
                    text: '删除',
                    width: '10%',
                    align: 'center',
                    border: 0,
                    sortable: false,
                    cls: 'mod-1',
                    renderer: function (value, metadata, record) {

                        var id = record.get('id');
                        var html = "<a href='javascript:void(0);' onclick=\"delS(" + id + ")\">"+delico+"</a>";
                        return html;
                        // return getExpandableImage(value, metadata,record);
                    }


                }



            ],
            listeners: {
                boxready: function () {


                    var height = Ext.dom.Element.getViewportHeight();
                    //console.log('viewportHeight:'+height);
                    this.maxHeight = height-90 ;
                    this.doLayout();
                },
                afterlayout: function (grid) {






               /*    var data_height = 0;
                    try {
                        data_height = grid.getView().getEl().down('.x-grid-table').getHeight();
                    } catch (e) {
                    }
                    var height = Ext.dom.Element.getViewportHeight();
                    console.log(data_height+'---'+height);
                    if (data_height > height - 106) {
                        window.has_biged = true;
                        grid.height = height - 106;
                    }
                    else if (data_height < height - 106) {
                        if (window.has_biged) {
                            delete window.grid.height;
                            window.has_biged = false;
                            grid.doLayout();
                        }
                    }*/
                }
            },
            plugins: [
                Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 2,
                    listeners: {
                        edit: function (editor, e) {
                            var id = e.record.get('mid');
                            //  var view_el=window.product_grid.getView().getEl();
                            //  view_el.scrollBy(0,this.scroll_top,false);
                            updateField(0, id, e.field, e.value, 0);
                            return false;

                        }

                    }
                })
            ],
            viewConfig: {

            }
        });
        
})

//切换每页显示数量
function changeNum(combo, records) {

    var pagesize = records[0].get('num');
    window.product_store.pageSize = pagesize;
    window.product_grid.down('pagingtoolbar').moveFirst();
    //window.product_store.load({start:0});
}

$(function(){


    var typeid = "{$typeid}";
    var channelname = "{$channelname}";
    //查看数据报表
    $(".btn_report").click(function(){
        var url=SITEURL+"?g=Zhcms&a=Admin&c=TourOrder&m=dataview&typeid="+typeid;
        floatBox(channelname+'订单数据报表查看',url,860,510,function(){});

    })
    //导出excel
    $(".btn_excel").click(function(){
        var url=SITEURL+"?g=Zhcms&a=Admin&c=TourOrder&m=excel&typeid="+typeid;
        floatBox(channelname+'订单生成excel',url,560,380,function(){});
    })

    //获取当前产品订单常规信息
    $.getJSON(SITEURL+'?g=Zhcms&a=Admin&c=TourOrder&m=ajax_sell_info&typeid='+typeid,function(data){
        $("#today_price").html(data.today);
        $("#last_price").html(data.last);
        $("#thisweek_price").html(data.thisweek);
        $("#thismonth_price").html(data.thismonth);
        $("#total_price").html(data.total);

    })
    
    





})

window.dialog = null;
    seajs.config({
        alias: {
            "jquery": "jquery-1.10.2.js"
        }
    });
    //定义全局dialog对象
    seajs.use([ '__STATIC__/tour/js/artDialog/src/dialog-plus'], function (dialog) {
        window.dialog = dialog;
    
    });

    function floatBox(boxtitle, url, boxwidth, boxheight, closefunc, nofade,fromdocument) {
            boxwidth = boxwidth != '' ? boxwidth : 0;
            boxheight = boxheight != '' ? boxheight : 0;
            var func = $.isFunction(closefunc) ? closefunc : function () {
            };
            fromdocument = fromdocument ? fromdocument : null;//来源document
        
            window.d = window.dialog({
                url: url,
                title: boxtitle,
                width: boxwidth,
                height: boxheight,
                loadDocument:fromdocument,
                onclose: function () {
                    func();
                }
        
            })
        
        
            if (boxwidth != 0) {
                d.width(boxwidth);
            }
            if (boxheight != 0) {
                d.height(boxheight);
            }
            if (nofade) {
                d.show()
            } else {
                d.showModal();
            }
        
        
            /* dialog({
             title: '添加导航',
             height: 300,
             url: ajaxurl,
             //quickClose: true,
             onshow: function () {
             console.log('onshow');
             },
             oniframeload: function () {
             console.log('oniframeload');
             },
             onclose: function () {
             */
            /*if (this.returnValue) {
             $('#value').html(this.returnValue);
             }*/
            /*
             ST.Util.showMsg('保存成功',4);
             getNav();
        
             //console.log('onclose');
             },
             onremove: function () {
             console.log('onremove');
             }
             })*/
        
        }

//按进行搜索
function search() {
    var keyword = $.trim($("#searchkey").val());
    var datadef = $("#searchkey").attr('datadef');
    keyword = keyword==datadef ? '' : keyword;
    window.product_store.getProxy().setExtraParam('keyword',keyword);
    window.product_store.load();


}

//选择全部
function chooseAll() {
    var check_cmp = Ext.query('.product_check');
    for (var i in check_cmp) {
        if (!Ext.get(check_cmp[i]).getAttribute('checked'))
            check_cmp[i].checked = 'checked';
    }

    //  window.sel_model.selectAll();
}
//反选
function chooseDiff() {
    var check_cmp = Ext.query('.product_check');
    for (var i in check_cmp)
        check_cmp[i].click();

}

//更新某个字段
function updateField(ele, id, field, value, type) {
    var record = window.product_store.getById(id.toString());

    if (type == 'select') {
        value = Ext.get(ele).getValue();
    }
    var view_el = window.product_grid.getView().getEl();


    Ext.Ajax.request({
        url: SITEURL+"?g=Zhcms&a=Admin&c=TourOrder&m=index&action=update",
        method: "POST",
        datatype: "JSON",
        params: {id: id, field: field, val: value, kindid: 0},
        success: function (response, opts) {
            if (response.responseText == 'ok') {


                record.set(field, value);
                record.commit();
                // view_el.scrollBy(0,scroll_top,false);
            }
        }});

}


//查看订单
function view(id,typeid)
{
    var url=SITEURL+"?g=Zhcms&a=Admin&c=TourOrder&m=view&id="+id+"&typeid="+typeid;
    floatBox('查看订单信息',url,450,300,function(){window.product_store.load()});
}

</script>
</body>
</html>