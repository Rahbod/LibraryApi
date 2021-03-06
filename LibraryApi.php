<?php
include_once 'Curl.php';
class LibraryApi
{
    // Authentication Data
    private $_http_x = true;
    // Authentication Data
    private $_auth_token;
    // Api Base Url
    private $_api_base_url;
    // Response Code
    private $_response_code;
    // Response
    private $_response;

    // CURL Headers
    public $_headers;

    public function __construct($token, $api_base_url, $http_header = false)
    {
        $this->_http_x = $http_header?true:false;
        $this->_auth_token = $token?:false;
        $this->_api_base_url = $api_base_url?:false;
        if(!$this->_auth_token || empty($this->_auth_token))
            die('Auth Token was not set! Please set it correctly.');
        if(!$this->_api_base_url || empty($this->_api_base_url))
            die('API BASE URL was not set! Please set it correctly.');
        // Set the access token
        $this->setHeaders();
    }

    /**
     * @param bool $cache
     * @param null $contentLength
     */
    private function setHeaders($cache = false, $contentLength = NULL)
    {
        $prefix = $this->_http_x?"X-":"";
        $this->_headers = array(
            "{$prefix}Authorization: Token {$this->_auth_token}",
            'Content-Type: application/json',
        );

        if($cache === false){
            $this->_headers[] = 'Cache-Control: no-cache, no-store, must-revalidate';
        }

        if($contentLength === true){
            $this->_headers[] = 'Content-Length: ' . $contentLength;
        }
    }

    /**
     *  Simple debug helper
     *
     * @param mixed $options
     * @return string print_r($option)
     **/
    private function debug($options)
    {
        echo '<pre>';
        print_r($options);
        echo '</pre>';
    }

    /**
     *  Public method to retrieve the last response code
     *
     * @return int/string $this->_response_code
     **/
    public function getResponseCode()
    {
        return $this->_response_code;
    }

    public function getResponse()
    {
        return $this->_response;
    }

    public function getBookList($options = array())
    {
        $queryParams = [];
        if($options)
            $queryParams = $options;
        if($queryParams){
            $data = http_build_query($queryParams);
            // Build the Calendar URL
            $url = $this->_api_base_url . "/list?" . $data;
        }else
            $url = $this->_api_base_url . "/list";
        // Load the CURL Library
        $curl = new Curl($url);
        // Set the headers
        $curl->setHeader($this->_headers);
        // Make the request
        $this->_response = json_decode($curl->run('GET'), true);
        // Set the response code for debugging purposes
        $this->_response_code = $curl->getStatus();
        // We should receive a 200 response. If we don't, return a blank array
        if($this->_response_code != '200')
            return [
                'error' => true,
                'code' => $this->_response_code,
                'response' => $this->_response,
            ];
        // Return the results as an array
        return $this->_response;
    }

    /**
     * @param $id int Book id
     * @return array|mixed
     */
    public function getBookDetails($id)
    {
        $queryParams = ['id' => $id];
        $data = http_build_query($queryParams);
        // Build the Calendar URL
        $url = $this->_api_base_url . "/bookDetails?" . $data;
        // Load the CURL Library
        $curl = new Curl($url);
        // Set the headers
        $curl->setHeader($this->_headers);
        // Make the request
        $this->_response = json_decode($curl->run('GET'), true);
        // Set the response code for debugging purposes
        $this->_response_code = $curl->getStatus();
        // We should receive a 200 response. If we don't, return a blank array
        if($this->_response_code != '200')
            return [
                'error' => true,
                'code' => $this->_response_code,
                'response' => $this->_response,
            ];
        // Return the results as an array
        return $this->_response;
    }

}