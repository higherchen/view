<?php

namespace higherchen\view;

class View {

	/**
	 * @var array View data
	 */
	protected $data;

	/**
	 * @var string The path to the view file
	 */
	protected $path;

	/**
	 * Create a new view instance.
	 *
	 * @param  string  $view
	 * @param  string  $path
	 * @param  array   $data
	 * @return void
	 */
	public function __construct($path, $data = []) {
		$this->path = rtrim($path, '/');

		$this->data = (array) $data;
	}

	/**
	 * Get the string contents of the view.
	 *
	 * @param  \Closure|null  $callback
	 * @return string
	 */
	public function render($name, $data, $display = true) {
		if (is_array($data)) {
			$this->data = array_merge($this->data, $data);
		}
		extract($this->data);

		$path = "{$this->path}/{$name}.php";
		ob_start();

		if (version_compare(PHP_VERSION, '5.4') >= 0 && !ini_get('short_open_tag') && function_exists('eval')) {
			echo eval('?>' . preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($path))));
		} else {
			include $path;
		}

		if ($display === false) {
			$buffer = ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}
	}

	/**
	 * Add a piece of data to the view.
	 *
	 * @param  string|array  $key
	 * @param  mixed   $value
	 * @return $this
	 */
	public function with($key, $value = null) {
		if (is_array($key)) {
			$this->data = array_merge($this->data, $key);
		} else {
			$this->data[$key] = $value;
		}

		return $this;
	}

	/**
	 * Get the array of view data.
	 *
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Get the path to the view file.
	 *
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * Set the path to the view.
	 *
	 * @param  string  $path
	 * @return void
	 */
	public function setPath($path) {
		$this->path = $path;
	}

	/**
	 * Determine if a piece of data is bound.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function offsetExists($key) {
		return array_key_exists($key, $this->data);
	}

	/**
	 * Get a piece of bound data to the view.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function offsetGet($key) {
		return $this->data[$key];
	}

	/**
	 * Set a piece of data on the view.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function offsetSet($key, $value) {
		$this->with($key, $value);
	}

	/**
	 * Unset a piece of data from the view.
	 *
	 * @param  string  $key
	 * @return void
	 */
	public function offsetUnset($key) {
		unset($this->data[$key]);
	}

	/**
	 * Get a piece of data from the view.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function &__get($key) {
		return $this->data[$key];
	}

	/**
	 * Set a piece of data on the view.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value) {
		$this->with($key, $value);
	}

	/**
	 * Check if a piece of data is bound to the view.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function __isset($key) {
		return isset($this->data[$key]);
	}

	/**
	 * Remove a piece of bound data from the view.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function __unset($key) {
		unset($this->data[$key]);
	}
}
