<?php
namespace Concrete\Core\User;

/**
 * Common interface for User, UserInfo and user entity instances.
 */
interface UserInterface
{
    /**
     * Get the user ID.
     *
     * @return int|null
     */
    public function getUserID();

    /**
     * Get the user name.
     *
     * @return string
     */
    public function getUserName();

    /**
     * Get the default language.
     *
     * @return string
     */
    public function getUserDefaultLanguage();

    /**
     * Get the user's preferred time zone.
     *
     * @return string
     */
    public function getUserTimezone();

    /**
     * Get the User entity instance (if available).
     *
     * @return \Concrete\Core\Entity\User\User|null
     */
    public function getEntityObject();

    /**
     * Get the UserInfo instance (if available).
     *
     * @return \Concrete\Core\User\UserInfo|null
     */
    public function getUserInfoObject();

    /**
     * Get the User instance (if available).
     *
     * @return \Concrete\Core\User\User|null
     */
    public function getUserObject();
}
