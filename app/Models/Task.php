<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model{
    use HasFactory;
    public static function validate($request){
        $request->validate([
            'title'=>'required|max:50',
            'message'=>'required',
            'image'=>'nullable|mimes:pdf|max:2048',
            'assigned_to'=>'nullable|exists:users,id',
            'created_by'=>'nullable|exists:users,id',
            'department_assigned_to'=>'required|exists:departments,id',
            'subtasks'=>'nullable|json',
            'progress'=>'nullable|in:unassigned,pending,complete,closed'
        ]);
        if(!$request->filled('progress')){
            $request->merge(['progress'=>'unassigned']);
        }
    }
    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function getTitle(){
        return $this->attributes['title'];
    }
    public function setTitle($title){
        return $this->attributes['title'] = $title;
    }
    public function getMessage(){
        return $this->attributes['message'];
    }
    public function setMessage($message){
        $this->attributes['message'] = $message;
    }
    public function created_by(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function getCreatedBy(){
        return $this->created_by()->first();
    }
    public function setCreatedBy($createdBy){
        $this->created_by = $createdBy;
    }
    public function assigned_to(){
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function getAssignedTo(){
        return $this->assigned_to()->first();
    }
    public function setAssignedTo($assignedTo){
        $this->assigned_to = $assignedTo;
    }
    public function department_assigned_to(){
        return $this->belongsTo(Department::class, 'department_assigned_to');
    }
    public function supervised_by(){
        return $this->belongsTo(User::class, 'supervised_by');
    }
    public function getSupervisedBy(){
        return $this->supervised_by()->first();
    }
    public function setSupervisedBy($user){
        $this->supervised_by = $user;
    }
    public function getDepartmentAssignedTo(){
        return $this->department_assigned_to()->first();
    }
    public function setDepartmentAssignedTo($department){
        $this->department_assigned_to = $department;
    }
    public function getSubTasks(){
        return json_decode($this->attributes['sub-tasks'], true) ?? [];
    }
    public function setSubTasks($task){
        $this->attributes['sub-tasks'] = json_encode($task);
    }
    public function getProgress(){
        return $this->attributes['progress'];
    }
    public function setProgress($progress){
        return $this->attributes['progress'] = $progress;
    }
    public function getImage(){
        return $this->attributes['image'];
    }
    public function setImage($image){
        $this->attributes['image'] = $image;
    }
    public function getPriority(){
        return ucfirst($this->attributes['priority']);
    }
    public function setPriority($priority){
        $this->attributes['priority'] = $priority;
    }
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt){
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function getDateAssigned(){
        return $this->attributes['date_assigned'];
    }
    public function setDateAssigned($date){
        $this->attributes['date_assigned'] = $date;
    }
    public function getDateCompleted(){
        return $this->attributes['date_completed'];
    }
    public function setDateCompleted($date){
        $this->attributes['date_completed'] = $date;
    }
    public function getDateClosed(){
        return $this->attributes['date_closed'];
    }
    public function setDateClosed($date){
        $this->attributes['date_closed'] = $date;
    }
}