<?php
 /**
 * Query class
 *
 * @package default
 * @author  Kevin Anaya www.anaya@gmail.com
 * 07/05/2015 Adding those methods:
 * affected_rows(); Shows the number of affected rows in the last SQL
 * error(); Shows the error in the SQL statement + the error No.
 * 24/05/2015 Adding needs to know when a SQL statement error occurs.
 * Specifically in the method query_array which is the HEART method of
 * this class.
 **/

require_once 'Fck.class.php';

class Query extends Fck
{

    private $sql;

    public function __construct($sql)
    {
        # Agarrar la consulta...
        $this->sql = $sql;

    }

    public function query_array_assoc()
    {

        return self::getCon()->query($this->sql)->fetch_all(MYSQLI_ASSOC);

    }

    public function query_numrows()
    {
        self::query_array();
        return self::getCon()->query($this->sql)->num_rows;
    }

    public function query_array()
    {

        if (!$this->sql == null) {
            # Si consulta NO esta vacio... Then it could work.
            
            # Let's check if the query works...
            if (!self::getCon()->query($this->sql)) {
                # If the query doesn't work
                return print self::error();
            } else {
                # If the query works
                return self::getCon()->query($this->sql)->fetch_all(MYSQLI_BOTH);
            }

        } else {
            # Si no, mostrar error error...
            print 'No hay consulta: ' . $this->sql . '. ';
        }

    }

    public function query_numcol()
    {
        self::query_array();
        return self::getCon()->query($this->sql)->field_count;
    }

    public function insert_single_query()
    {
        return self::getCon()->query($this->sql);
    }

    public function exec_query()
    {
        return self::getCon()->query($this->sql);
    }

    public function affected_rows()
    {
        return self::getCon()->affected_rows;
    }

    public function error()
    {
        return 'SQL Error: ' . self::getCon()->error . '<br>SQL error No.: ' . self::getCon()->errno;
    }
}

?>