<?php

/**
 * The Student database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Student extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Student Enrollment No.
     */
    protected $_enrollment_no;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @validate required, alpha, min(3), max(32)
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
     * @validate required, max(100)
     * @label email address
     */
    protected $_email;


    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @validate numeric, min(8), max(15)
     * @label name
     */
    protected $_phone;
    

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * @label Active status
     */
    protected $_active;

    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label Warning for Employee
     */
    protected $_warning;
    
    
    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_last_ip;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_last_login;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_modified;
}
