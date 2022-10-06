<?php 
    define("BASE_URL", "https://api.nasa.gov/mars-photos/api/v1/rovers/");
    class Rover {
        private $name;
        private $dateType;
        private $dateValue;
        private $cameraType;

        public function getData(){

            $ch = curl_init($this->buildUrl());

            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $res = curl_exec($ch);
            curl_close($ch);

            return json_decode($res, true);
        }

        private function buildUrl(){
            $config = ConfigUtil::getConfig();
            $key = $config['api_key'];

            return BASE_URL . $this->name . "/photos?" . $this->dateType . "=" 
                . $this->dateValue . "&api_key=" . $key; 
        }

    	/**
	 * @return mixed
	 */
	function getCameraType() {
		return $this->cameraType;
	}
	
	/**
	 * @param mixed $cameraType 
	 * @return Rover
	 */
	function setCameraType($cameraType): self {
		$this->cameraType = $cameraType;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getDateValue() {
		return $this->dateValue;
	}
	
	/**
	 * @param mixed $dateValue 
	 * @return Rover
	 */
	function setDateValue($dateValue): self {
		$this->dateValue = $dateValue;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name 
	 * @return Rover
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getDateType() {
		return $this->dateType;
	}
	
	/**
	 * @param mixed $dateType 
	 * @return Rover
	 */
	function setDateType($dateType): self {
		$this->dateType = $dateType;
		return $this;
	}
}