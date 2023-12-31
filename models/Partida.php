<?php 
class Partida {
    private $id;
	private $jogador;
    private $acertos;
    private $erros;
    private $data_hora;

	public function __construct($jogador, $acertos, $erros) {
		$this->jogador = $jogador;
		$this->acertos = $acertos;
		$this->erros = $erros;
	}

    private static function connectDB() {
		$dbPath = substr(__DIR__, 0, strrpos(__DIR__, "galatic-shooter") + 15)."/db/gs_db.sqlite";
		$conn = new PDO("sqlite:".$dbPath);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		return $conn;
		
    }

	public function save() {
		date_default_timezone_set('America/Sao_Paulo');
		$this->data_hora = date('d/m/Y H:i', time());
		
		$conn = Partida::connectDB();

		$prepare = $conn->prepare("INSERT INTO partidas(jogador, acertos, erros, data_hora) VALUES(:jogador, :acertos, :erros, :datahora);");

		$prepare->bindParam(":jogador", $this->jogador);
		$prepare->bindParam(":acertos", $this->acertos);
		$prepare->bindParam(":erros", $this->erros);
		$prepare->bindParam(":datahora", $this->data_hora);

		return $prepare->execute();
	}

	public static function listar() { 
		$conn = Partida::connectDB();

        $q = $conn->query("SELECT * FROM partidas ORDER BY acertos DESC, erros ASC, data_hora DESC;");
        $partidas = $q->fetchAll();
    
        return $partidas;
	}

    /* --- GETTERS AND SETTERS ---*/
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getJogador() {
		return $this->jogador;
	}

	public function setJogador($jogador) {
		$this->jogador = $jogador;
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