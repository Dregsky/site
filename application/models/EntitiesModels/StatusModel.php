<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Status;

/**
 * Description of StatusModel
 * Model from:
 * @var Status
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class StatusModel extends Model {

    const name = 'EntitiesModels\StatusModel';

    /**
     * 
     * @return Status
     */
    public function getEntity() {
        return Status::name;
    }

}
