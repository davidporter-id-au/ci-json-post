<? if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * JSON post handing
 */
class JSON {

	public function __construct() {
	}

	/**
	 * decode JSON POST and return it as a pure multidimensional PHP array. 
	 */
	public function post() {
		return $this->recurseTypecast(json_decode(file_get_contents('php://input')));
	}

	/**
	 * Retursively iterates through and typecasts a given object to an array;
	 */
	private function recurseTypecast($object) {

		if(!is_array($object) && !is_object($object)) {
			return $object;
		}

		//If is an object, attempt to typecast
		if(is_object($object)) {
			$object = (array)$object; 
		}

		//if array, recurse further
		if(is_array($object)) {
			foreach($object as &$o) {
				if(is_object($o)) {
					$o = $this->recurseTypecast($o);
				}
			}
		}
		return $object; 
	}


	/**
	 * Return a raw string sent in POST
	 */
	public function rawPOST() {
		return file_get_contents('php://input');
	}
}
