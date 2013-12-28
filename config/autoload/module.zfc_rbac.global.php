<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

/**
 * Copy-paste this file to your config/autoload folder (don't forget to remove the .dist extension!)
 */

return [
    'zfc_rbac' => [
        /**
         * Key that is used to fetch the identity provider
         *
         * Please note that when an identity is found, it MUST implements the ZfcRbac\Identity\IdentityProviderInterface
         * interface, otherwise it will throw an exception.
         */
        'identity_provider' => 'User\\Identity\\IdentityProvider',

        /**
         * This option allows to specify if you want the Rbac container to automatically create roles inside the
         * container when it has not been added
         *
         * For instance, if you have a role that has a parent role that has not been added yet, if you set this
         * option to true, then the parent role will be created
         */
        // 'create_missing_roles' => true,

        /**
         * Set the guest role
         *
         * This role is used by the authorization service when the authentication service returns no identity
         */
        // 'guest_role' => 'guest',

        /**
         * Allow to force the reload of roles and permissions each time "isGranted" is called in the
         * AuthorizationService. This can be useful if you have custom role and permission providers that lazy
         * load roles and permissions based on the current identity roles and asked permission (especially if
         * you have tons of roles/permissions)
         */
        // 'force_reload' => false,

        /**
         * Set the guards
         *
         * You must comply with the various options of guards. The format must be of the following format:
         *
         *      'guards' => [
         *          'ZfcRbac\Guard\RouteGuard' => [
         *              // options
         *          ]
         *      ]
         */
        // 'guards' => [],

        /**
         * As soon as one rule for either route or controller is specified, a guard will be automatically
         * created and will start to hook into the MVC loop.
         *
         * If the protection policy is set to DENY (default), then any route/controller will be denied by
         * default UNLESS it is explicitly added as a rule. On the other hand, if it is set to ALLOW, then
         * not specified route/controller will be implicitly approved.
         *
         * DENY is the most secure way, but it is more work for the developer
         */
        // 'protection_policy' => GuardInterface::DENY,

        /**
         * Configuration for role providers
         *
         * It must be an array of array that contains configuration for each role provider. Each provider config
         * must follow the following format:
         *
         *      'ZfcRbac\Role\InMemoryRoleProvider' => [
         *          'role1',
         *          'children' => 'parent'
         *      ]
         *
         * Supported options depend of the role provider, so please refer to the official documentation
         */
        'role_providers' => [
            'ZfcRbac\Role\InMemoryRoleProvider' => [
                'user',
                'system' => 'user',
                'system.moderator' => 'system',
                'system.admin' => 'system.moderator',
                'account' => 'user',
                'account.admin' => 'account',
                'company' => 'user',
                'company.admin' => 'company',
                'company.manager' => 'company',
                'company.dispatcher' => 'company',
            ]
        ],

        /**
         * Configuration for permission providers
         *
         * It must be an array of array that contains configuration for each permission provider. Each provider
         * config must follow the following format:
         *
         *      'ZfcRbac\Permission\InMemoryRoleProvider' => [
         *          'permission1' => ['role1', 'role2']
         *      ]
         *
         * Supported options depend of the permission provider, so please refer to the official documentation
         */
        'permission_providers' => [
            'ZfcRbac\Permission\InMemoryPermissionProvider' => [
               'account.create' => ['user'],
               'account.edit' => ['account.admin', 'system'],
               'account.list' => ['user', 'system'],
               'account.info' => ['user', 'system'],
               'company.create' => ['account.admin', 'system'],
            ]
        ],

        /**
         * Configure the unauthorized strategy. It is used to render a template whenever a user is unauthorized
         */
        'unauthorized_strategy' => [
            /**
             * Set the template name to render
             */
            // 'template' => 'error/403'
        ],

        /**
         * Configure the redirect strategy. It is used to redirect the user to another route when a user is
         * unauthorized
         */
        'redirect_strategy' => [
            /**
             * Set the route to redirect (of course, it must exist!)
             */
            // 'redirect_to_route' => 'login',

            /**
             * If a user is unauthorized and redirected to another route (login, for instance), should we
             * append the previous URI (the one that was unauthorized) in the query params?
             */
            // 'append_previous_uri' => true,

            /**
             * If append_previous_uri option is set to true, this option set the query key to use when
             * the previous uri is appended
             */
            // 'previous_uri_query_key' => 'redirectTo'
        ],

        /**
         * Various plugin managers for guards, role providers and permission providers. Each of them must
         * follow a common plugin manager config format, and can be used to create your custom objects
         */
        // 'guard_manager'               => [],
        // 'role_provider_manager'       => [],
        // 'permission_provider_manager' => [],
    ]
];
