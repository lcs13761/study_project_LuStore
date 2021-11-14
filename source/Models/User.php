<?php 


namespace Source\Models;

use Source\Core\Model;

class User extends Model 
{
    protected $fillable = ["name","email","password","email_verified"];
    protected $table = "users";
    protected $protected = ["id","created_at","updated_at","level"];


    public function hasVerifiedEmail(){
        
        return $this->update(["email_verified" => null]);
    }
    
}