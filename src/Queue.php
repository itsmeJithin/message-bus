<?php

namespace com\ovaq\core;

/**
 *
 * @author jithinvijayan
 * @Date 02/04/20
 */
class Queue
{
    /**
     * Storing queue semaphore
     *
     * @var null
     */
    private static $queue = NULL;

    /**
     * Returns the semaphore message queue
     *
     * @return null
     */
    public static function getQueue()
    {
        # Some unique Id
        define('QUEUE_KEY', 12345);

        # Different type of actions
        define('QUEUE_TYPE_START', 1);
        define('QUEUE_TYPE_END', 2);

        # Setup the queue
        self::$queue = msg_get_queue(QUEUE_KEY);

        # Return the queue
        return self::$queue;
    }

    /**
     * With given key storing new message into our queue
     *
     * @param string $key - Reference to the message
     * @param array $data - Some data to pass into the message
     */
    public static function addMessage($key, $data = array())
    {
        # Sending messages
        $message = new Message($key, $data);

        # Sending the message
        if (msg_send(self::$queue, QUEUE_TYPE_START, $message)) {
            print_r(msg_stat_queue(self::$queue));
        } else {
            echo "Error adding to the queue. Error: $msg_err" . PHP_EOL;
        }

    }

}