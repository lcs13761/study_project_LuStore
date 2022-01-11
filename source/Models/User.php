<?php 


namespace Source\Models;

use Source\Core\Database\Model;

class User extends Model 
{
    protected array $fillable = ['auth_id',"photo","name","email","password","email_verified","email_verification_at"];
    protected string $table = "users";
    protected array $protected = ["id","created_at","updated_at","level"];


    public function hasVerifiedEmail(): int
    {
        return $this->update(["email_verified" => null,"email_verification_at" => $this->timeNow()]);
    }

    public function oAuthGoogle($auth): string
    {
        $verify_email = $this::where('email',$auth->getEmail())->andWhere('auth_id',$auth->getId(),'!=')->count();
        $userAuth = $this::where("auth_id",$auth->getId())->fetch();
        if (!$userAuth && $verify_email == 0) {

            $userAuth = $this->create([
                'auth_id' => $auth->getId(),
                "name" => $auth->getName(),
                "email" =>  $auth->getEmail(),
                'password' => passwd($auth->getId()),
                'photo' => $auth->getAvatar(),
                "email_verification_at" => $this->timeNow()
            ]);
        }
        if($verify_email > 0) return "login";
        Auth::attempt([
            "email" => $auth->getEmail(),
            "password" => $auth->getId()
        ],true);
        return "/";
    }

    public function timeNow(): string
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y-m-d H:i:s');
    }

}