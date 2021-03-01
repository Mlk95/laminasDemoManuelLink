<?php

namespace Userdata\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

/**
 * Hier wird nach aktueller Empfehlung der Laminas Dokumentation mit dem Table Data Gateway Pattern gearbeitet.
 * Andere möglichkeiten wären z.B: Object-Relational Mapping (ORM) wie Doctrine,
 * wo man durch ORM Notations der Entity und die Attribute mit dem Pendant in der Datenbank verknüpft bzw. "mappt".
 * Exchange Array Methode kopiert Daten aus Data auf die entsprechenden Attribute der Entity.
 * Bis Zend 3 findet man die Entitys noch im Ordner Entity hier entsprechend unter Model.
 */
class UserTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getUser($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function getUserByLastName($lastname)
    {
        $rowset = $this->tableGateway->select(['lastname' => $lastname]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find user row with lastname %d',
                $lastname
            ));
        }

        return $row;
    }
}