<?php 


namespace Source\Support\Oauth2;
use League\OAuth2\Client\Provider\Google;

class GoogleAuth{

  public $code;
  public $error;
  private $google;
  private $token;
  private $profile;
  

    public function __construct(){
      $this->google = new Google(CONF_GOOGLE);
      $this->code = filter_input(INPUT_GET,'code',FILTER_SANITIZE_STRIPPED);
      $this->error = filter_input(INPUT_GET,'error',FILTER_SANITIZE_STRIPPED);
      }

    public function authorization(){
      $authUrl = $this->google->getAuthorizationUrl();
      $this->google->getState();
      return $authUrl;
    }

    public function user(){
          $this->profile();
          return $this->profile;
    }

    private function profile(){

        $this->token = $this->google->getAccessToken('authorization_code',[
          'code' => $this->code
        ]);

        $userDetails = $this->google->getResourceOwner($this->token);
        $this->profile = $userDetails;
    }

  
}