<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSection extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'form_sections';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const FORM_HAS_FILE_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $fillable = [
        'form_section_name',
        'fields',
        'form_has_file',
        'file_name',
        'service_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}