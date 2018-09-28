<?php

namespace Arane\Base\Models\Entities;

use Arane\Base\Models\Traits\ModelTrait;
use Arane\Document\Models\Entities\DocumentOrder;
use Arane\Guide\Models\Entities\Guide;
use Illuminate\Database\Eloquent\Model;

class State extends Model {

    use ModelTrait;

    protected $table = 'states';

    protected $guarded = [];

    public $incrementing = false;
    public $keyType = 'string';
    
    protected $casts = [];
    
    protected $attributes = [];
    
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $shown = ['id'];
    
    public function getShownAttribute(){
        return $this->shown;
    }


    //RELATIONSHIPS WITH OTHERS MODELS
    public function guides() {
        return $this->belongsToMany(Guide::class, 'guide_state', 'state_id', 'guide_id')->withTimestamps();
    }
    
    public function documentOrders() {
        return $this->hasMany(DocumentOrder::class);
    }

}
