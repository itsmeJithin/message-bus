<?php


namespace com\ovaq\core;

/**
 *
 * @author jithinvijayan
 * @Date 02/04/20
 */
class Worker
{
    /**
     * Storing the semaphore queue handler
     *
     * @var null
     */
    private $queue = NULL;

    /**
     * Storing the instance of the read message
     *
     * @var null
     */
    private $message = NULL;

    /**
     * Setting environment, loading the queue and then processing the message
     *
     * Worker constructor.
     */
    public function __construct()
    {
        # Getting the queue
        $this->queue = Queue::getQueue();

        $this->process();
    }

    private function process()
    {
        $messageType = NULL;
        $messageMaxSize = 1024;
        printf("Processing started" . PHP_EOL);
        while (msg_receive($this->queue, QUEUE_TYPE_START, $messageType, $messageMaxSize, $this->message)) {

            # throwing the obtained messages
            $this->complete($messageType, $this->message);

            # Resetting the message state
            $messageType = NULL;
            $this->message = NULL;
        }
        printf("Processing completed" . PHP_EOL);
    }

    /**
     * Handling the message read from the queue
     *
     * @param integer $messageType - The actual type of the message
     * @param Message $message -  The actual message object
     */
    private function complete($messageType, Message $message)
    {
        # Getting the message key
        echo $message->getKey();

    }

}