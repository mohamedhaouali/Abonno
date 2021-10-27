<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = ['nom_fr','nom_ar','code','municipalite_id',
        'adresse','latitude','longitude'
    ];

    public function municipalite(){

        return $this->belongsTo(Municipalite::class);
    }


    public function  users()
    {
        return $this->hasMany(User::class);
    }


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {

        $link = '<a href="'.route('agences.show', $this).'"';

        $link .= $this->nom_fr;
        $link .= '</a>';

        return $link;
    }


    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('agence.nom_fr').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('agence.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }



}
