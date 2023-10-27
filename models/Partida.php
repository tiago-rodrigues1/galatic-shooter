<?php 
class Partida {
    private $id;
    private $acertos;
    private $erros;
    private $data_hora;

    private function connect() {
        $conn = new PDO("sqlite:../db/gs_db.sqlite");
		$conn->setAttribute("PDO::ATTR_DEFAULT_FETCH_MODE", PDO::FETCH_OBJ);

		return $conn;
    }

    /* --- GETTERS AND SETTERS ---*/
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getAcertos() {
		return $this->acertos;
	}

	public function setAcertos($acertos) {
		$this->acertos = $acertos;
	}

	public function getErros() {
		return $this->erros;
	}

	public function setErros($erros) {
		$this->erros = $erros;
	}

	public function getData_hora() {
		return $this->data_hora;
	}

	public function setData_hora($data_hora) {
		$this->data_hora = $data_hora;
	}
}
?>