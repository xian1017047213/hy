<?php include_once __DIR__.'/../user/loginveri.php';?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/productleftnav.php';?>
<div class="conright">
<div class="conheader"><span>商品管理</span> </div>
<div class="c-r-c">
<div class="ui-block-content ui-block-content-lb">
<table>
	<tbody>
		<tr>
			<td><label>商品编码</label></td>
			<td><span id="searchkeytext"> <input type="text" id="code" name="q_sl_code" placeholder="商品编码" class="ui-table-default ui-corner-all"> </span>
			</td>
			<td><label>商品名称</label></td>
			<td><span id="searchkeytext"><input type="text" id="title" name="q_sl_title" placeholder="商品名称" class="ui-table-default ui-corner-all" > </span>
			</td>
			<td><label>状态</label></td>
			<td><span id="searchkeytext"> 
			<select id="lifecycle" name="q_int_lifecycle" class="ui-table-default ui-corner-all">
				<option value="">不限</option>
				<option value="1">上架</option>
				<option value="0">下架</option>
				<option value="3">新建</option>
			</select></span></td>

		</tr>
		<tr>
			<td><label>商品创建时间</label></td>
			<td><input type="text" id="createStartDate" name="q_date_createStartDate" class="ui-table-default ui-corner-all hasDatepicker"></td>
			<td align="center"><label>——</label></td>
			<td><input type="text" name="q_date_createEndDate" id="createEndDate" class="ui-table-default ui-corner-all hasDatepicker" ></td>
			<td><label>分类</label></td>
			<td><input type="hidden" id="categoryId" name="q_long_categoryId" > <input type="text" id="categoryName"  placeholder="分类"
				class="ui-table-default ui-corner-all"></td>
		</tr>
		<tr>

			<td><label>商品上架时间</label></td>
			<td><input type="text" id="listStartDate" name="q_date_listStartDate" class="ui-table-default ui-corner-all hasDatepicker"></td>
			<td align="center"><label>——</label></td>
			<td><input type="text" name="q_date_listEndDate" id="listEndDate" class="ui-table-default ui-corner-all hasDatepicker"></td>
			<td><label>商品类型</label></td>
			<td><select name="q_int_type" class="ui-table-default ui-corner-all">
				<option value="">不限</option>
				<option value="1">主商品</option>
				<option value="0">赠品</option>
			</select></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		</tr>

	</tbody>
</table>
<div class="button-line">
<button  type="submit" class="btn btn-default ng-binding">搜索</button>
                </div>
            </div>
</div>
<div class="ui-block">
<div id="table" class="border-grey ui-table-simple-table">
<span class="ui-table-title">商品列表</span>
<div class="ui-table-nav">
<div class="nav-pager">
<a href="javascript:void(0);" class="home disabled" title="首页"> 首页 </a>
	<a href="javascript:void(0);" class="prev disabled" title="上一页">上一页</a>
	<a href="javascript:void(0);" class="next" title="下一页">下一页</a>
	<a href="javascript:void(0);" class="end" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" value="1">
	<button type="submit" class="pagego">GO</button>
	<span class="pagenum" title="总页数">35</span>
	<span class="recnum" title="总记录数">522</span>
	</div>
</div>
<table class="table" cellpadding="0">
	<thead>
		<tr>
			<th class="col-0" width="3%">
			<div><input type="checkbox"></div>
			</th>
			<th class="col-1" width="5%">
			<div>商品编码<span></span></div>
			</th>
			<th class="col-2" width="10%">
			<div>商品名称<span></span></div>
			</th>
			<th class="col-3" width="5%">
			<div>所属行业<span></span></div>
			</th>
			<th class="col-4" width="10%">
			<div>分类</div>
			</th>
			<th class="col-5" width="5%">
			<div>默认分类</div>
			</th>
			<th class="col-6" width="4%">
			<div>状态</div>
			</th>
			<th class="col-7 sort-desc" width="10%">
			<div>创建时间<span></span></div>
			</th>
			<th class="col-8" width="10%">
			<div>修改时间<span></span></div>
			</th>
			<th class="col-9" width="10%">
			<div>最近上架时间<span></span></div>
			</th>
			<th class="col-10" width="10%">
			<div>定时上架时间<span></span></div>
			</th>
			<th class="col-11" width="5%">
			<div>商品类型<span></span></div>
			</th>
			<th class="col-12" width="7%">
			<div>商品图片个数<span></span></div>
			</th>
			<th class="col-13" width="5%">
			<div>操作</div>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr class="odd">
			<td class="col-0 "><input type="checkbox" name="chid" class="checkId"
				value="4509"></td>
			<td class="col-1 "><span title="531222">531222</span></td>
			<td class="col-2 "><span title="Woodland Adjustable Apron">Woodland
			Adjustable Apron</span></td>
			<td class="col-3 "><span title="服装">服装</span></td>
			<td class="col-4 ">无</td>
			<td class="col-5 ">无</td>
			<td class="col-6 "><span class="ui-pyesno ui-pyesno-wait" title="新建"></span></td>
			<td class="col-7 "><span title="2016-2-22 10:50:52">2016-2-22
			10:50:52</span></td>
			<td class="col-8 "><span title="2016-2-24 14:45:27">2016-2-24
			14:45:27</span></td>
			<td class="col-9 "><span title="&nbsp;">&nbsp;</span></td>
			<td class="col-10 "><span title="&nbsp;">&nbsp;</span></td>
			<td class="col-11 ">主商品</td>
			<td class="col-12 ">0</td>
			<td class="col-13 ">
			<div class="ui-poplist">
			<div class="current">修改</div>
			<ul style="z-index: 16;">
				<li><a href="/item/updateItem.htm?itemId=4509">修改</a></li>
				<li><a href="/i18n/itemImage/toAddItemImage.htm?itemId=4509">图片管理</a></li>
				<li><a href="/item/updateItemStore.htm?itemId=4509">库存管理</a></li>
				<li><a href="javascript:void(0);" jsfunc="fnEnabledItem" idx="0">上架</a></li>
				<li><a href="javascript:void(0);" jsfunc="fnActiveItem" idx="0">定时上架</a></li>
				<li><a href="javascript:void(0);" jsfunc="fnDeleteItem" idx="0">删除</a></li>
			</ul>
			</div>
			</td>
		</tr>

	</tbody>
</table>
<div class="ui-table-nav">
<div class="nav-pager">
<a href="javascript:void(0);" class="home disabled" title="首页"> 首页 </a>
	<a href="javascript:void(0);" class="prev disabled" title="上一页">上一页</a>
	<a href="javascript:void(0);" class="next" title="下一页">下一页</a>
	<a href="javascript:void(0);" class="end" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" value="1">
	<button type="submit" class="pagego">GO</button>
	<span class="pagenum" title="总页数">35</span>
	<span class="recnum" title="总记录数">522</span></div>
</div>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="../../scripts/commons.js"></script>

</html>