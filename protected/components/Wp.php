<?php
/* Wordpress-like helpers */
/* So you can use codex for documentation! */

class Wp {


	public static $url;
	public static $name;

	public static function inject()
	{
		
		function get_bloginfo ($prop = 'name'){
			if ( is_null(Wp::$$prop) ) {
				switch ($prop) {
					case 'name': 
						Wp::$$prop = Yii::app()->name;	
						break;
					case 'url': 
						Wp::$$prop = Yii::app()->request->baseUrl;	
						break;
					default: 
						throw new Exception('´' . $prop . '´ could not be found.', 1);
				}
			}
			return Wp::$$prop;
		}

		function get_site_url() {
			return get_bloginfo('url');
		}

		function site_url(){
			echo get_bloginfo('url');
		}

	}

}

