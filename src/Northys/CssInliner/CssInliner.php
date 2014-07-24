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

	/**
	 * @var DOMDocument
	 */
	private $dom;

	/**
	 * @var DOMXPath
	 */
	private $finder;



	public function addCSS($filename)
	{
		if ( ! $css = @file_get_contents($filename)) {
			throw new \Exception("Failed on loading CSS file. Check the file path you have provided!", 1);
		}
		// merge all CSS content into $this-css variable
		$this->css .= $css;
	}



	public function parseCSS() {
		// get styles inside <style> tags in provided HTML
		foreach ($this->dom->getElementsByTagName('style') as $style) {
			$this->css .= $style->textContent;
		}
		$parser = new CSS\Parser($this->css);

		$css = $parser->parse();
		if (!$css) {
			throw new \Exception("You haven't provided any styles by addCSS() method. There is also no styles inside HTML.", 1);			
		}
		return $css;
	}



	public function render($html)
	{
		$this->dom = new \DOMDocument;
		$this->dom->loadHTML($html);
		$this->finder = new \DOMXPath($this->dom);
		$this->css = $this->parseCSS();
		foreach ($this->css->getAllRuleSets() as $ruleSet) {
			$selector = $ruleSet->getSelector();
			foreach ($this->finder->evaluate(CssSelector::toXPath($selector[0])) as $node) {
				if ($node->getAttribute('style')) {
					$node->setAttribute('style', $node->getAttribute('style') . implode(' ', $ruleSet->getRules()));
				} else {
					$node->setAttribute('style', implode(' ', $ruleSet->getRules()));
				}
			}
		}

		return $this->dom->saveHTML();
	}

}
