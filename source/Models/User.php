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

    public function timeNow(): string
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y-m-d H:i:s');
    }

}