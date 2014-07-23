<?php
namespace Northys;

use Symfony\Component\CssSelector\CssSelector,
	Sabberworm\CSS;

/**
 * Description of Inliner
 *
 * @author Northys
 */
class Inliner {
	/** @var Sabberworm\CSS\Parser */
	private $css;
	
	public function addCSS ($filename) {
		$this->css = new CSS\Parser(file_get_contents($filename));
		$this->css = $this->css->parse();
	}
	
	public function render ($html, $return = FALSE) {
		$dom = new \DOMDocument;
		$dom->loadHTML($html);
		$finder = new \DOMXPath($dom);
		
		foreach ($this->css->getAllRuleSets() as $ruleSet) {
			$selector = $ruleSet->getSelector();
			foreach ($finder->evaluate(CssSelector::toXPath($selector[0])) as $node) {
				$node->setAttribute('style', implode(' ', $ruleSet->getRules()));
			}
		}
		if ($return == TRUE) {
			return $dom->saveHTML();
		} else {
			echo $dom->saveHTML();
		}
	}
}