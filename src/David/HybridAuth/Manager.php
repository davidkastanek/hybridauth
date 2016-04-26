<?php

/**
 * @author David Kaštánek <kastanekdavid@gmail.com>
 * @copyright Copyright (c) 2016, David Kaštánek
 */

namespace David\HybridAuth;

class Manager extends \Nette\Object
{
    /** @var \Hybrid_Auth */
    private $hybridAuth;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->hybridAuth = new \Hybrid_Auth($config);
    }

    /**
     * Try to authenticate the user with a given provider.
     *
     * If the user is already connected we just return and instance of provider adapter,
     * ELSE, try to authenticate and authorize the user with the provider.
     *
     * $params is generally an array with required info in order for this provider and HybridAuth to work,
     *  like :
     *          hauth_return_to: URL to call back after authentication is done
     *        openid_identifier: The OpenID identity provider identifier
     *           google_service: can be "Users" for Google user accounts service or "Apps" for Google hosted Apps
     *
     * @param string $providerId ID of the provider
     * @param array  $params      Params
     * @return
     */
    public function authenticate($providerId, $params = null)
    {
        return $this->hybridAuth->authenticate($providerId, $params);
    }

    /**
     * Process the current request
     *
     * @param array $request The current request parameters. Leave as null to default to use $_REQUEST.
     * @return Hybrid_Endpoint
     */
    public function process($request = null)
    {
        \Hybrid_Endpoint::process();
    }
}
