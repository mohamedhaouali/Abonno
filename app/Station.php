<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $guarded = [];

    protected $filiable = [
        'nombre','nom_fr', 'nom_ar', 'latitude', 'longitude', 'creator_id','adresse'
    ];
    /* APPend POPup google map*/
    public $appends = [
        'coordinate', 'map_popup_content',
    ];


    public function abonnementscolaire()
    {
        return $this->hasMany(Abonnementscolaire::class);
    }

    public function abonnementcivile()
    {
        return $this->hasMany(Abonnementcivile::class);
    }

    public function abonnementsociale()
    {
        return $this->hasMany(Abonnementsociale::class);
    }


    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'nom_fr' => $this->nom_fr, 'type' => __('station.station'),
        ]);
        $link = '<a href="'.route('stations.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->nom_fr;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
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
        $mapPopupContent .= '<div class="my-2"><strong>'.__('station.nom_fr').':</strong><br>'.$this->nom_fr.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('station.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }

    public function lignes()
    {
        return $this->belongsToMany(Ligne::class, 'ligne_station','station_id','ligne_id');
    }

}



