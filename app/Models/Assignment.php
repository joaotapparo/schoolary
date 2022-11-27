<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'professor_id',
        'semester_id',
        'class_id',
        'section_id',
        'course_id',
        'session_id',
        'assignment_name',
        'assignment_file_path'
    ];

    /**
     * Get the professor.
     */
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    /**
     * Get the schoolClass.
     */
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the section.
     */
    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Get the course.
     */
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
