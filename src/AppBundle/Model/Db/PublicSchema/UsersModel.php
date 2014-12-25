<?php

namespace Model\Db\PublicSchema;

use PommProject\ModelManager\Model\CollectionIterator;
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
     */
    public function __construct()
    {
        $this->structure = new UsersStructure;
        $this->flexible_entity_class = "\Model\Db\PublicSchema\Users";
    }

    /**
     * @param Where      $where
     * @param string     $suffix
     *
     * @return CollectionIterator
     */
    public function findWithoutAuthKey(Where $where = null, $suffix = '')
    {
        $projection = $this->createProjection()
                          ->unsetField('auth_key');

        $sql = sprintf('SELECT %s FROM %s'
          , $projection
          , $this->getStructure()->getRelation()
        );

        if ($where)
            $sql .= ' WHERE '. $where;

        if ($suffix)
            $sql .= ' '. $suffix;

        return $this->query($sql, $where ? $where->getValues() : [], $projection);
    }

}
