<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Carbon\Carbon;

class RequestService extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'request_services';

    protected $appends = [
        'contract',
        'cost_1_file',
        'cost_2_file',
        'finished_files',
        'finished_files_from_admin',
        'certificates',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending' => 'قيد الأنتظار',
        'refused' => 'مرفوض',
        'accept'  => 'مقبول',
    ]; 

    public const STAGES_SELECT = [
        'contract' => 'العقد',
        'cost_1_pending'  => 'منتظر الدفعة الأولي',
        'working' => 'قيد التنفيذ', 
        'cost_2_pending'  => 'منتظر الدفعة الثانية',
        'delivered' => 'تم تسليم العمل',
        'done' => 'تم الأنتهاء',
    ]; 

    protected $fillable = [
        'user_id',
        'service_id',
        'consultant_id',
        'contract_accept',
        'status',
        'stages',
        'cost_1',
        'cost_2',
        'start_date',
        'end_date',
        'done_time',
        'duration_to_edit',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    
    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function getDoneTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDoneTimeAttribute($value)
    {
        $this->attributes['done_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getContractAttribute()
    {
        return $this->getMedia('contract')->last();
    }

    public function getCost1FileAttribute()
    {
        return $this->getMedia('cost_1_file')->last();
    }

    public function getCost2FileAttribute()
    {
        return $this->getMedia('cost_2_file')->last();
    }
    
    public function getFinishedFilesAttribute()
    { 
        return $this->getMedia('finished_files');
    }

    public function getCertificatesAttribute()
    { 
        return $this->getMedia('certificates');
    }

    public function getFinishedFilesFromAdminAttribute()
    { 
        return $this->getMedia('finished_files_from_admin');
    }
}
