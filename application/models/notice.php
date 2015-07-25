<?php

/**
 * The Employee database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Notice extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Employee Who Updated Notice.
     */
    protected $_employee_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @validate required, max(100)
     * @label Notice Title
     */
    protected $_refrence;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 1
     * 
     * @label Students/ Non Student
     */
    protected $_for_user;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @validate required, max(10)
     * @label Event Date / Last Date
     */
    protected $_event_date;

   
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @validate required, max(100)
     * @label Notice Title
     */
    protected $_title;
    
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
     * @label Content
     */
    protected $_content;
    
}
