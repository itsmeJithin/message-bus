<?php


namespace com\ovaq\core;

/**
 *
 * @author jithinvijayan
 * @Date 02/04/20
 */
class Message
{

    /**
     * @var string
     */
    private $key = '';

    /**
     * @var array
     */
    private $data = array();

    /**
     * This will pass the data
     *
     * Message constructor.
     * @param $key
     * @param $data
     */
    public function __construct($key, $data)
    {
        $this->key = $key;
        $this->data = $data;
    }

    /**
     * Returns the key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

}