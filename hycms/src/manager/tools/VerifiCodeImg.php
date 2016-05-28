<?php

namespace hybase\Tools;

/**
 *
 * @name SystemParameter
 * @author Baron
 *         生成验证码
 */
class VerifiCodeImg {
	
	/*
	 * 默认图片宽度
	 */
	public static $DEFAULT_WIDTH = 100;
	/*
	 * 默认图片高度
	 */
	public static $DEFAULT_HEIGHT = 40;
	/*
	 * 默认字体大小
	 */
	public static $DEFAULT_FONTSIZE = 20;
	/*
	 * 默认字符源
	 */
	public static $VERFICODE_STRING = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";
	/*
	 * 默认字符长度
	 */
	public static $STRING_LENGTH = 4;
	/**
	 * 
	 * @param  $fontStyle 字體文件路径
	 * @param  $width
	 * @param  $height
	 * @param  $fontsize
	 * @param  $string
	 * @param  $strLength
	 */
	public  function verfiCodeImg($fontStyle,$width = NULL, $height = NULL, $fontsize = NULL, $string = NULL, $strLength = NULL) {
		$width = empty ( $width ) ? self::$DEFAULT_WIDTH : $width;
		$height = empty ( $height ) ? self::$DEFAULT_HEIGHT : $height;
		$fontsize = empty ( $fontsize ) ? self::$DEFAULT_FONTSIZE : $fontsize;
		$string = empty ( $string ) ? self::$VERFICODE_STRING : $string;
		$strLength = empty ( $strLength ) ? self::$STRING_LENGTH : $strLength;
		$str = Array (); // 用来存储随机码
		for($i = 0; $i < $strLength; $i ++) {
			$str [$i] = $string [rand ( 0, 56 )];
			$vcode .= $str [$i];
		}
		session_start (); // 启用超全局变量session
		$_SESSION ["vcode"] = strtolower ( $vcode );
		$image = imagecreatetruecolor ( $width, $height );
		$widthhite = imagecolorallocate ( $image, 255, 255, 255 ); // 第一次调用设置背景色
		$black = imagecolorallocate ( $image, 200, 200, 200 ); // 边框颜色
		imagefilledrectangle ( $image, 0, 0, $width, $height, $widthhite ); // 画一矩形填充
		imagerectangle ( $image, 0, 0, $width - 1, $height - 1, $black ); // 画一矩形框
		/* 生成雪花背景
		for($i = 1;$i < 200;$i++){
		$x = mt_rand(1,$width-9);
		$y = mt_rand(1,$height-9);
		$color = imagecolorallocate($image,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		imagechar($image,1,$x,$y,"*",$color);
		} */
		// 将验证码写入图案
		for($i = 0; $i < count ( $str ); $i ++) {
			$x = 13 + $i * ($width - 15) / 4;
			$y = mt_rand ( $fontsize, $height );
			$color = imagecolorallocate ( $image, mt_rand ( 0, 225 ), mt_rand ( 0, 150 ), mt_rand ( 0, 225 ) );
			imagettftext ( $image, $fontsize, rand ( 13, 20 ), $x, $y, $color, $fontStyle, $str [$i] );
		}
		
		ob_clean ();
		return $image;
	}
}
?>