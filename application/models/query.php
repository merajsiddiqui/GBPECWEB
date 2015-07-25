<?php

/**
 * The Query database Model 
 *
 * @author Meraj Ahmad Siddiqui
 */
class Query extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @label name
     */
    protected $_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label email address
     */
    protected $_email;
   
    /**
     * @column
     * @readwrite
     * @type text
     * @length 15
     * 
     * @label Contact No.
     */
    protected $_mobile;
    
    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label Subject oF the message
     */
    protected $_subject;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 1000
     * @index
     * @label Message
     */
    protected $_message;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * @label department
     */
    protected $_department;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * @label Address
     */
    protected $_address;
}
