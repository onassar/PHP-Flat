<?php

    /**
     * Flat
     *
     * @link    https://github.com/onassar/PHP-Flat
     * @author  Oliver Nassar <onassar@gmail.com>
     */
    class Flat extends stdClass
    {
        /**
         * _path
         * 
         * @var     string|false (default: false)
         * @access  protected
         */
        protected $_path = false;

        /**
         * __construct
         * 
         * @access  public
         * @param   string $path
         * @return  void
         */
        public function __construct($path)
        {
            $this->_path = $path;
            $contents = file_get_contents($this->_path);
            $data = json_decode($contents);
            $this->_setup($data);
        }

        /**
         * _setup
         * 
         * @access  protected
         * @param   stdClass $data
         * @return  void
         */
        public function _setup($data)
        {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        /**
         * save
         * 
         * @access  public
         * @return  void
         */
        public function save()
        {
            $encoded = json_encode($this);
            file_put_contents($this->_path, $encoded);
        }
    }
