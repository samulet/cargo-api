<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

return array(
    'log' => array(
        'Application\Log' => array(
            'writers' => array(
                array(
                    'name' => 'stream',
                    'options' => array(
                        'stream' => __DIR__ . '/../../data/log/api-app.log',
                        'formatter' => array(
                            'name' => 'Simple',
                            'options' => array(
                                'format' => '%timestamp% %priorityName%: %message% {%extra%}',
                                'dateTimeFormat' => 'c', // @see http://php.net/manual/en/function.date.php
                            ),
                        ),
                        'filters' => array(
                            array(
                                'name' => 'Priority',
                                'options' => array(
                                    'priority' => Zend\Log\Logger::INFO, // Zend\Log\Logger::INFO,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'stream',
                    'priority' => 10,
                    'options' => array(
                        'stream' => __DIR__ . '/../../data/log/api-app.debug.log',
                        'formatter' => array(
                            'name' => 'Simple',
                            'options' => array(
                                'format' => '%timestamp% %priorityName%: %message% {%extra%}',
                            ),
                        ),
                        'filters' => array(
                            array(
                                'name' => 'Priority',
                                'options' => array(
                                    'priority' => Zend\Log\Logger::DEBUG, // Zend\Log\Logger::DEBUG,
                                    'operator' => '>=',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'exceptionhandler' => true,
            'errorhandler' => true,
        ),
    ),
);
