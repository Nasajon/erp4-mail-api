<?php
namespace Helper;

/**
 * Helper Criado Para agregar as funções suporte a banco
 */
class Database extends \Codeception\Module\Db
{

    private function addInsertedRow($table, array $row, $id)
    {
        $primaryKey = $this->_getDriver()->getPrimaryKey($table);
        $primary = [];
        if ($primaryKey) {
            if ($id && count($primaryKey) === 1) {
                $primary [$primaryKey[0]] = $id;
            } else {
                foreach ($primaryKey as $column) {
                    if (isset($row[$column])) {
                        $primary[$column] = $row[$column];
                    } else {
                        throw new \InvalidArgumentException(
                            'Primary key field ' . $column . ' is not set for table ' . $table
                        );
                    }
                }
            }
        } else {
            $primary = $row;
        }

        $this->insertedRows[$this->currentDatabase][] = [
            'table' => $table,
            'primary' => $primary,
        ];
    }


    /**
     * Inserts an SQL record into a database. This record will be erased after the test.
     *
     * ```php
     * <?php
     * $I->haveInDatabase('users', array('name' => 'miles', 'email' => 'miles@davis.com'));
     * ?>
     * ```
     *
     * @param string $table
     * @param array $data
     *
     * @return mixed $id
     */
    public function haveInDatabase($table, array $data, $key = null)
    {
        $lastInsertId = $this->_insertInDatabase($table, $data, $key);

        $this->addInsertedRow($table, $data, $lastInsertId);

        return $lastInsertId;
    }

    public function _insertInDatabase($table, array $data, $key = null)
    {
        $query = $this->_getDriver()->insert($table, $data);
        $parameters = array_values($data);
        $this->debugSection('Query', $query);
        $this->debugSection('Parameters', $parameters);
        $this->_getDriver()->executeQuery($query, $parameters);

        try {
            $lastInsertId = $data[$key];
        } catch (\Exception $e) {
            // ignore errors due to uncommon DB structure,
            // such as tables without _id_seq in PGSQL
            $lastInsertId = 0;
            $this->debugSection('error', $e->getMessage());
        }
        return $lastInsertId;
    }
}