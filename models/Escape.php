<?php 
	namespace Houdini ;
	use HTMLPurifier_Config as PurifierConfig ;
	use HTMLPurifier as Purifier ; 
	/**
	* 
	*/
	class Escape {
		
		private static $purifier ;
		private static $purifier_config ; 
		private static $purifier_config_options = array(
			'Core.DefinitionCache' => null
		);

		public static $tags_whitelist ; 

		public $purified ; 

		function __construct($string){
			if(! isset(static::$purifier)) self::build_purifier() ;
			$this->purified = self::$purifier->purify($string) ;
		}

		function __toString(){
			return $this->purified ; 
		}

		static function build_purifier(){
			self::$purifier_config = PurifierConfig::createDefault();
			foreach (self::$purifier_config_options as $k => $v) {
				self::$purifier_config->set($k, $v) ;
			}

			self::$purifier = new Purifier(self::$purifier_config) ;
		}
	}

 ?>