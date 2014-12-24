<?php

namespace Model\Db\PublicSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\Projection;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;

use PommProject\Foundation\Where;

use Model\Db\PublicSchema\AutoStructure\Users as UsersStructure;
use Model\Db\PublicSchema\Users;

/**
 * UsersModel
 *
 * Model class for table users.
 *
 * @see Model
 */
class UsersModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->structure = new UsersStructure;
        $this->flexible_entity_class = "\Model\Db\PublicSchema\Users";
    }
}
