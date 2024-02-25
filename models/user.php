<?
 
 class User{
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private int $role_id;
    
    public function __construct(int $id,string $username,string $password,string $email,int $role_id ) {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        $this->role_id=$role_id;
        
    }
    
 



 }