<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model{
    use HasFactory;

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function getDepartmentName(){
        return $this->attributes['name'];
    }
    public function setDepartmentName($departmentName){
        $this->attributes['name'] = $departmentName;
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
    public function setUsers($user){
        $this->user = $users;
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function getTasks(){
        return $this->tasks;
    }
    public function setTasks($tasks){
        $this->tasks = $tasks;
    }
}