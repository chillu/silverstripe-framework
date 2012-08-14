<?php
/**
 * @package framework
 * @subpackage http
 */

namespace SilverStripe\Framework\Http;

use SilverStripe\Framework\Dev\Deprecation;

/**
 * A base class for http requests and responses.
 *
 * @package framework
 * @subpackage http
 */
abstract class Message {

	/**
	 * @var string
	 */
	protected $body;

	/**
	 * @var array
	 */
	protected $headers = array();

	/**
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * @param string $body
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * @return array
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * @param array $headers
	 */
	public function setHeaders(array $headers) {
		foreach($headers as $k => $v) $this->setHeader($k, $v);
	}

	/**
	 * Gets a header by name.
	 *
	 * @param string $name
	 * @return string
	 */
	public function getHeader($name) {
		if(isset($this->headers[$name])) return $this->headers[$name];
	}

	/**
	 * Sets a header by name.
	 *
	 * @param string $name
	 * @param string $value
	 */
	public function setHeader($name, $value) {
		$this->headers[$name] = $value;
	}

	/**
	 * Unsets a header by name.
	 *
	 * @param string $name
	 */
	public function unsetHeader($name) {
		if(isset($this->headers[$name])) unset($this->headers[$name]);
	}

	/**
	 * @deprecated 3.1 Please use {@link setHeader()}.
	 */
	public function addHeader($name, $value) {
		Deprecation::notice('3.1', 'Use Message::setHeader()');
		$this->setHeader($name, $value);
	}

	/**
	 * @deprecated 3.1 Please use {@link unsetHeader()}.
	 */
	public function removeHeader($header) {
		Deprecation::notice('3.1', 'Use Message::unsetHeader()');
		$this->unsetHeader($header);
	}

}