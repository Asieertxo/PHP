<?php

class Empleado extends Conexion{
    public $empno;
    public $ename;
    public $job;
    public $mgr;
    public $hiredate;
    public $sal;
    public $comm;
    public $depno;

    public function __construct($empno = null, $ename = null, $job = null, $mgr = null, $hiredate = null, $sal = null, $comm = null, $depno = null){
        $this->empno = $empno;
        $this->ename = $ename;
        $this->job = $job;
        $this->mgr = $mgr;
        $this->hiredate = $hiredate;
        $this->sal = $sal;
        $this->comm = $comm;
        $this->depno = $depno;

        parent::__construct();
    }

    public function selectEmp(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM emp");
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function showEmp(){
        $result = self::selectEmp();
        while($registro = $result->fetch(PDO::FETCH_ASSOC)){
            echo "$registro[empno]--$registro[ename]<br>";
        }
        $result->closeCursor();
    }
}

?>