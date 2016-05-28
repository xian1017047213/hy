<?php
namespace hybase\Tools;
/**
 * @name SystemParameter 
 * @author Baron
 * 系统关键参数管理
 */
class SystemParameter{
	/*
	 * html默认文件路径
	 */
	//public static $htmlPath=$_SERVER['DOCUMENT_ROOT'].'/html/';
	/*
	 * 文件类型
	 */
	public static $archiveFileType='html';
	/*
	 * 新建文章
	 */
	public static $newArchive=1;
	/*
	 * 已发布文章
	 */
	public static $publishedArchive=2;
	/*
	 * 删除文章
	 */
	public static $deletedArchive=3;
	/*
	 * 启用状态
	 */
	public static $enableStatus=1;
	/*
	 * 禁用状态
	 */
	public static $disableStatus=0;
	/*
	 * 卖品
	 */
	public static $productTypeSale = 1;
	/*
	 * 非卖品
	 */
	public static $productTypeUnSale = 2;
	
	/*
	 * 未上架商品
	 */
	public static $productStatusIni = 1;
	/*
	 * 已上架商品
	 */
	public static $productStatusList = 2;
	/*
	 * 已下架商品
	 */
	public static $productStatusOut = 3;
	/*
	 * 已删除商品
	 */
	public static $productStatusdelete = 4;
	
	/*
	 * 多选按钮
	 */
	public static $editTypeWithCheckbox=1;
	/*
	 * 单选按钮
	 */
	public static $editTypeWithRadio=2;
	/*
	 * 下拉框
	 */
	public static $editTypeWithSelect=3;
	/*
	 * 输入文本框
	 */
	public static $editTypeWithInputtext=4;
	/*
	 * 列表每页记录数
	 */
	public static $recordOfEveryPage=20;
	/*
	 * 系统用户类型
	 */
	public static $sysUserType = 1;
	/*
	 * 普通用户类型
	 */
	public static $genUserType = 2;
	/*
	 * 有效用户
	 */
	public static $effectUserStatus = 1;
	/*
	 * 无效用户
	 */
	public static $invalidUserStatus=2;
	/*
	 * 操作用户状态为有效
	 */
	public static $operValidStatus='valid';
	/*
	 * 操作用户状态为无效
	 */
	public static $operInvalidStatus='invalid';
	/*
	 * 首页
	 */
	public static $pageOfFirst='firstPage';
	/*
	 * 上一页
	 */
	public static $pageOfPrev='prevPage';
	/*
	 * 下一页
	 */
	public static $pageOfNext='nextPage';
	/*
	 * 最后一页
	 */
	public static $pageOfLast='lastPage';
}