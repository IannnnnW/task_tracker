<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{
    use HasFactory;
    public function getId(){
        return $this->attributes['id'];
    }
    public function getRole(){
        return $this->attributes['role'];
    }
    public function setRole($role){
        $this->attributes['role'] = $role;
    }
    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }
    public function setUpdatedAt($updatedAt){
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function getUsers(){
        return $this->users;
    }
    public function setUsers($users){
        $this->users = $users;
    }
}