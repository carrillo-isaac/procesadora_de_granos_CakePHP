<?php

declare(strict_types=1);

namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Authentication\Identifier\IdentifierInterface;
use Psr\Http\Message\ServerRequestInterface;


/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 *
 * @extends \Cake\Http\BaseApplication<\App\Application>
 */
class Application extends BaseApplication
implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI !== 'cli') {
            // The bake plugin requires fallback table classes to work properly
            FactoryLocator::add('Table', (new TableLocator())->allowFallbackClass(false));
        }
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Error handler
        $middlewareQueue->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this));

        // Serve assets
        $middlewareQueue->add(new AssetMiddleware([
            'cacheTime' => Configure::read('Asset.cacheTime'),
        ]));

        // Routing
        $middlewareQueue->add(new RoutingMiddleware($this));

        // Authentication
        $middlewareQueue->add(new AuthenticationMiddleware($this));

        // Body Parser para JSON (muy importante para APIs)
        $middlewareQueue->add(new BodyParserMiddleware());

        // -------------------------
        // CSRF con excepción para API
        // -------------------------

        $csrf = new CsrfProtectionMiddleware([
            'httponly' => true,
        ]);

        // Esta línea DESACTIVA el CSRF solo para prefijo "Api"
        $csrf->skipCheckCallback(function ($request) {
            return $request->getParam('prefix') === 'Api';
        });

        // Agregamos el middleware csrf corregido
        $middlewareQueue->add($csrf);

        return $middlewareQueue;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/5/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void {}

    // tomar el inicio de sesión de la vista html
    public function getAuthenticationService(
    ServerRequestInterface $request
): AuthenticationServiceInterface {

    $service = new AuthenticationService();

    // Redirección cuando NO hay sesión
    // $prefix = $request->getAttribute('params')['prefix'] ?? null;


    $service->setConfig([
        'unauthenticatedRedirect' => '/login',
        'queryParam' => 'redirect',
    ]);


    // IDENTIFICADOR (Usuarios)
    $service->loadIdentifier('Authentication.Password', [
        'fields' => [
            'username' => 'email',
            'password' => 'password',
        ],
        'resolver' => [
            'className' => 'Authentication.Orm',
            'userModel' => 'Usuarios',
        ],
    ]);
    $service->loadAuthenticator('Authentication.Session');
    // AUTHENTICATOR FORM
    $service->loadAuthenticator('Authentication.Form', [
        'fields' => [
            'username' => 'email',
            'password' => 'password',
        ],
        'loginUrl' => '/login',
    ]);

    return $service;
}
}
