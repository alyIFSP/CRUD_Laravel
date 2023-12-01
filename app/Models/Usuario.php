<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    // Define the required methods for the Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getRememberToken()
    {
        // Implement if needed
    }

    public function setRememberToken($value)
    {
        // Implement if needed
    }

    public function getRememberTokenName()
    {
        // Implement if needed
    }
  protected $table = "usuario";
  protected $fillable = ['email', 'nome', 'senha'];

  public static function verificaUsuario($email, $senha){

    $usuario = self::where("email", $email)->first();
    if ($usuario && Hash::check($senha, $usuario->senha)) {
      return $usuario;
    }
    return null;
  }
  public static function cadastrarUsuario($nome, $email,  $senha){
    try {
      $senhaHash = Hash::make($senha);

      self::create(["nome" => $nome, "email" => $email, "senha" => $senhaHash]);
      return true;
    } catch (\Exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
}
