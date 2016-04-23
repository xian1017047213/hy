<?php 
namespace hybase\Tools;

class CommonsParam{
	/*
	 * 电话号码正则表达式
	 */
	public static $phoneNumPatch='/^(1)\d{10}$/';
	/*
	 * 邮箱正则表达式
	 */
	public static $emialPatch='/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/';
	/*
	 * 密码正则表达式
	 */
	public static $emialPatch='/^(\w){6,}$/';
}
?>