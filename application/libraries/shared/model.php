<?php

/**
 * Contains similar code of all models and some helpful methods
 *
 * @author Meraj Ahmad Siddiqui
 */

namespace Shared {

    class Model extends \framework\Model {

        /**
         * @column
         * @readwrite
         * @primary
         * @type autonumber
         */
        protected $_id;

        /**
         * @column
         * @readwrite
         * @type datetime
         */
        protected $_created;

        /**
         * Every time a row is created these fields should be populated with default values.
         */
        public function save() {
            $primary = $this->getPrimaryColumn();
            $raw = $primary["raw"];
            if (empty($this-> $raw)) {
                $this->setCreated(date("Y-m-d H:i:s"));
            }
            parent::save();
        }
    }

}