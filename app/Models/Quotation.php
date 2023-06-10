<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const POSITION_SELECT = [
        'general_manager'   => 'مدير عام',
        'executive_manager' => 'مدير تنفيذي',
        'other'             => 'اخري',
    ];

    protected $fillable = [
        'the_company',
        'name',
        'position',
        'phone_number',
        'email',
        'service_id',
        'is_sent_email',
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
