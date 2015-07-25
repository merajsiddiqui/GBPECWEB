<?php

/**
 * The Placement List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Placement extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Student Id
     */
    protected $_student_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Company Name
     */
    protected $_company;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Company Location
     */
    protected $_location;
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Annual Salry Offered By Companay
     */
    protected $_annual_salary;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Session Of the Placement
     */
    protected $_session;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @label Publish Or not
     */
    protected $_active;
}
