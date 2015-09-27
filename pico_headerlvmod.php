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
class Pico_HeaderLvMod {

  private $headinglevel;
  
	public function config_loaded(&$settings)
	{
		$this->headinglevel = isset($settings["headerlv"]["level"]) ?
		    $settings["headerlv"]["level"] : 3;
	}

	public function after_parse_content(&$content)
	{
	  $this->in_replace($content);
	}
	
	public function get_page_data(&$data, $page_meta)
	{
	  $this->in_replace($data["content"]);
	}
	
	private function in_replace(&$text)
	{
  	$text = preg_replace_callback('/(<\/?h)(\d)([^>]*>)/', function($m){
        return $m[2] + $this->headinglevel <= 6 ? $m[1] . ($m[2] + $this->headinglevel) . $m[3] : "";
      }, $text);
	}
	
}

?>
