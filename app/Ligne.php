<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{

    protected $fillable = [
        'nom_fr','nom_ar','num','distance','lignedebut','lignefin','prix', 'latitude', 'longitude'
    ];




    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function abonnementscolaires(){

        return $this->hasMany(Abonnementscolaire::class);
    }

    public function abonnementsociales(){

        return $this->hasMany(Abonnementsociale::class);
    }

    public function  abonnementciviles()
    {
        return $this->hasMany(Abonnementcivile::class);
    }

    public function  clients()
    {
        return $this->hasMany(Client::class);
    }



    public function  socials()
    {
        return $this->hasMany(Social::class);
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

        $link = '<a href="'.route('lignes.show', $this).'"';
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
        $mapPopupContent .= '<div class="my-2"><strong>'.__('ligne.nom_fr').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('ligne.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }



    public function stations()
    {
        return $this->belongsToMany(Station::class);
    }

}
