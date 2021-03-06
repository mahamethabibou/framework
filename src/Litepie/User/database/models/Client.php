<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Foundation\Auth\User as Authenticatable;
use Litepie\Hashids\Traits\Hashids;
use Litepie\User\Traits\User as UserProfile;

class Client extends Authenticatable
{
    use UserProfile, SoftDeletes, Hashids, Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'litepie.user.client';

    /**
     * Initialiaze page modal.
     *
     * @param $name
     */
    public function __construct($attributes = [])
    {
        $config = config($this->config);

        foreach ($config as $key => $val) {

            if (property_exists(get_called_class(), $key)) {
                $this->$key = $val;
            }

        }

        parent::__construct($attributes);

    }

}
