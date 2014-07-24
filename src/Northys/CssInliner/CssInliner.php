<?php

namespace Northys;

use Sabberworm\CSS;
use Symfony\Component\CssSelector\CssSelector;



/**
 * @author Northys
 */
class CSSInliner
{

	/**
	 * @var CSS\CSSList\Document
	 */
	private $css;



	public function addCSS($filename)
	{
		if ( ! $css = @file_get_contents($filename)) {
			throw new \Exception("Failed on loading CSS file. Check the file path you have provided!", 1);
		}

		$parser = new CSS\Parser($css);
		$this->css = $parser->parse();
	}



	public function render($html)
	{
		$dom = new \DOMDocument;
		$dom->loadHTML($html);
		$finder = new \DOMXPath($dom);

		foreach ($this->css->getAllRuleSets() as $ruleSet) {
			$selector = $ruleSet->getSelector();
			foreach ($finder->evaluate(CssSelector::toXPath($selector[0])) as $node) {
				if ($node->getAttribute('style')) {
					$node->setAttribute('style', $node->getAttribute('style') . implode(' ', $ruleSet->getRules()));
				} else {
					$node->setAttribute('style', implode(' ', $ruleSet->getRules()));
				}
			}
		}

		return $dom->saveHTML();
	}
}
