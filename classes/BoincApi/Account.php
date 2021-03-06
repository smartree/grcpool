<?php
class BoincApi_Account {
	
	private $url = '';
	private $url_signature = '';
	private $authenticator = '';
 	private $detach = '';
 	private $detach_when_done = '';
 	private $resource_share = '';
 	private $no_cpu = '';
 	private $no_cuda = '';
 	private $no_ati = '';
	private $no_intel = ''; 	
	
	public function getUrl() {return $this->url;}
	public function setUrl($s) {$this->url = $s;}
	public function getUrl_signature() {return $this->url_signature;}
	public function setUrl_signature($s) {$this->url_signature = $s;}
	public function getAuthenticator() {return $this->authenticator;}
	public function setAuthenticator($s) {$this->authenticator = $s;}
 	public function getDetach() {return $this->detach;}
 	public function setDetach($s) {$this->detach = $s;}
 	public function getDetach_when_done() {return $this->detach_when_done;}
 	public function setDetach_when_done($s) {$this->detach_when_done = $s;}
 	public function getResource_share() {return $this->resource_share;}
 	public function setResource_share($s) {$this->resource_share = $s;}
 	public function getNo_cpu() {return $this->no_cpu;}
 	public function setNo_cpu($s) {$this->no_cpu = $s;}
 	public function getNo_cuda() {return $this->no_cuda;}
 	public function setNo_cuda($s) {$this->no_cuda = $s;}
 	public function getNo_ati() {return $this->no_ati;}
 	public function setNo_ati($s) {$this->no_ati = $s;}
 	public function setNo_intel($s) {$this->no_intel = $s;}
 	public function getNo_intel() {return $this->no_intel;}
	
	public function toXml() {
		$fields = get_object_vars($this);
		$xml = "\n".'<account>'."\n";
		foreach ($fields as $fieldName => $fieldValue) {
			if ($fieldValue != '' || $fieldName == 'resource_share') {
				if ($fieldName == 'no_cpu') {
					$xml .= '<no_rsc>CPU</no_rsc>'."\n";
				} else if ($fieldName == 'no_intel') {
					$xml .= '<no_rsc>intel_gpu</no_rsc>'."\n";
				} else if ($fieldName == 'no_cuda') {
					$xml .= '<no_rsc>NVIDIA</no_rsc>'."\n";
				} else if ($fieldName == 'no_ati') {
					$xml .= '<no_rsc>ATI</no_rsc>'."\n";
				} else {
     					$xml .= '<'.$fieldName.'>'.$fieldValue.'</'.$fieldName.'>'."\n";
				}
			}
		}
		$xml .= '</account>'."\n";
		return $xml;
	}
}