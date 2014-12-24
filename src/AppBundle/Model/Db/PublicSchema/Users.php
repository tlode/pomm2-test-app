<?php

namespace Model\Db\PublicSchema;

use PommProject\ModelManager\Model\FlexibleEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * Users
 *
 * Flexible entity for relation
 * public.users
 *
 * @see FlexibleEntity
 *
 * @ExclusionPolicy("none")
 */
class Users extends FlexibleEntity
{
	/**
	 * @Exclude
	 */
	protected $auth_key;
}
