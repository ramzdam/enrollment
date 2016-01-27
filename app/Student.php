<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = array('student_number', 'fname', 'lname', 'address', 'zip', 'city', 'state', 'phone', 'mobile', 'email', 'year', 'section_id', 'dob');

    public function section() {
        return $this->belongsTo('App\Section');
    }

    public function setDobAttribute($value) {
        $this->attributes['dob'] = date('Y-m-d H:i:s', strtotime($value));
    }
}
