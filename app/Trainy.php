<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainy extends Model
{
    public function division(){
    	return $this->belongsTo(Division::class);
    }

    public function district(){
    	return $this->belongsTo(District::class);
    }

    public function upazila(){
    	return $this->belongsTo(Upazila::class);
    }

    public function exam(){
    	return $this->belongsTo(Exam::class);
    }
    public function board(){
    	return $this->belongsTo(Board::class);
    }
    public function university(){
    	return $this->belongsTo(University::class);
    }
}
