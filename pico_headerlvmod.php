<?php
/**
 * Pico Header Level Modify Plugin
 * 記事内のヘッダタグ(<hx>)のレベルを書き換えるプラグイン
 *
 * @author TakamiChie
 * @link http://onpu-tamago.net/
 * @license http://opensource.org/licenses/MIT
 * @version 1.0
 */
class Pico_HeaderLvMod extends AbstractPicoPlugin {

  protected $enabled = false;

  private $headinglevel;
  
	public function onConfigLoaded(&$config)
	{
		$this->headinglevel = isset($config["headerlv"]["level"]) ?
		    $config["headerlv"]["level"] : 3;
	}

	public function onSinglePageLoaded(array &$pageData)
	{
	  $this->in_replace($pageData["content"]);
	}
	
	private function in_replace(&$text)
	{
  	$text = preg_replace_callback('/(<\/?h)(\d)([^>]*>)/', function($m){
        return $m[2] + $this->headinglevel <= 6 ? $m[1] . ($m[2] + $this->headinglevel) . $m[3] : "";
      }, $text);
	}
	
}

?>
