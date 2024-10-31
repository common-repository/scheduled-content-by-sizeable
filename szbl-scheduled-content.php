<?php
/*
Plugin Name: Scheduled Content (by Sizeable)
Description: Use a shortcode [szbl_scheduled_content] and various attribtues to embed content on a schedule. Supports nested shortcodes.
Author: Sizeable Labs
Author URI: http://www.sizeablelabs.com
License: GPL2
Version: 1.3.2
*/
namespace Sizeable;

class ScheduledContent
{
	public static $instance;
	
	public static function init()
	{
		null === self::$instance && self::$instance = new self();
		return self::$instance;
	}
	
	public static function getInstance()
	{
		return self::init();
	}
	
	private function __construct()
	{
		\add_shortcode( 'szbl_scheduled_content', [ $this, 'process_shortcode' ] );
	}
	
	public static function str_to_bool( $string )
	{
		return ( \strtolower( $string ) == 'true' ) ? true : false;
	}
	
	public function process_shortcode( $atts, $content = '' )
	{
		\extract(\shortcode_atts([
			'start' => date_i18n( 'F j, Y g:ia' ),
			'end' => null,
			'ignore_year' => false,
			'content_filters' => 'true',
			'shortcodes' => 'true'
		], $atts ) );

		$content_filters = self::str_to_bool( $content_filters );
		$shortcodes = self::str_to_bool( $shortcodes );
		
		if ( !$content )
			return '';

		$current_time = \date_i18n( 'U' );
		$start = \date_i18n( 'U', \strtotime( $start ) );

		if ( !$ignore_year )
		{
			if ( $start > $current_time )
			{
				return '';
			}
			
			if ( !\is_null( $end ) && !empty( $end ) )
			{
				$end = \date_i18n( 'U', \strtotime( $end ) );
				if ( $end <= $current_time )
					return '';
			}
		}
		// If we ignore year, search for the timestamp starting with month
		else
		{
			if ( \date_i18n( 'mdHis', $start ) > \date_i18n( 'mdHis' ) )
			{
				return '';
			}
			
			if ( !\is_null( $end ) && !empty( $end ) )
			{
				$end = \date_i18n( 'U', \strtotime( $end ) );
				if ( \date_i18n( 'mdHis', $end ) <= \date_i18n( 'mdHis' ) )
					return '';
			}
		}

		if ( $content_filters )
		{
			$content = \apply_filters( 'the_content', $content );
		}
		elseif ( $shortcodes )
		{
			$content = \do_shortcode( $content );
		}
		
		return $content;
	}
	
}

ScheduledContent::init();