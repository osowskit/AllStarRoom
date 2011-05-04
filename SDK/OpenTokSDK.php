<?PHP

/*!
* OpenTok PHP Library
* http://www.tokbox.com/
*
* Copyright 2010, TokBox, Inc.
*
* Last modified: 2011-02-07
*/

require_once 'API_Config.php';
require_once 'OpenTokSession.php';

class OpenTokSDK {

	private $api_key;

	private $api_secret;

	public function __construct($api_key, $api_secret) {
		$this->api_key = $api_key;
		$this->api_secret = $api_secret;
	}

	/** - Generate a token
	 *
	 * $session_id  - If session_id is not blank, this token can only join the call with the specified session_id.
	 * $permissions - A list of permissions that the token has. Some API calls require a permission on the token. These can be found in the documentation on tokens.
	 * $expire_time - Optional timestamp to change when the token expires. See documentation on token for details.
	 */
    public function generate_token($session_id='', $permissions="", $expire_time=NULL) {
		$create_time = time();

		if(!is_array($permissions))
			$permissions = explode(',', $permissions);

		$permission_list = join('&permissions=', $permissions);
		$nonce = microtime(true) . mt_rand();

		$data_string = "session_id=$session_id&create_time=$create_time&permissions=$permission_list&nonce=$nonce";
        if(!is_null($expire_time))
			$data_string .= "&expire_time=$expire_time";

        $sig = $this->_sign_string($data_string, $this->api_secret);
		$api_key = $this->api_key;
		$sdk_version = API_Config::SDK_VERSION;

        return API_Config::TOKEN_SENTINEL . base64_encode("partner_id=$api_key&sdk_version=$sdk_version&sig=$sig:$data_string");
	}

	/**
	 * Creates a new session.
	 * $location - IP address to geolocate the call around.
	 * $properties - Optional array, keys are defined in SessionPropertyConstants
	 */
    public function create_session($location, $properties=array()) {
		$properties["location"] = $location;
		$properties["api_key"] = $this->api_key;

        $createSessionResult = $this->_do_request("/session/create", $properties);
        $createSessionXML = simplexml_load_string($createSessionResult, 'SimpleXMLElement', LIBXML_NOCDATA);

		$sessionId = $createSessionXML->Session->session_id;

		return new OpenTokSession($sessionId, null);
	}

    //////////////////////////////////////////////
    //Signing functions, request functions, and other utility functions needed for the OpenTok
    //Server API. Developers should not edit below this line. Do so at your own risk.
    //////////////////////////////////////////////

	protected function _sign_string($string, $secret) {
		return hash_hmac("sha1", $string, $secret);
	}

	protected function _do_request($url, $data) {
		$url = API_Config::API_SERVER . $url;

		$dataString = "";
		foreach($data as $key => $value){
			$value = urlencode($value);
			$dataString .= "$key=$value&";
		}

		$dataString = rtrim($dataString,"&");

		$ch = curl_init();

		$api_key = $this->api_key;
		$api_secret = $this->api_secret;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array("X-TB-PARTNER-AUTH: $this->api_key:$this->api_secret"));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

		$res = curl_exec($ch);

		curl_close($ch);

		return $res;
	}
}
