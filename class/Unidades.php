<?php

require_once 'Crud.php';

class Unidades extends Crud{
	
	protected $table = 'unidades';

	private $tipo;
	private $unidade;
	private $cnes;
	private $territorio;
	private $cep;
	private $endereco;
	private $numero;
	private $bairro;
	private $cidade;
	private $uf;

	//Get's e Set's

	public function setUnidade($unidade){
		$this->unidade = $unidade;
	}

	public function getUnidade(){
		return $this->unidade;
	}

	public function setCnes($cnes){
		$this->cnes = $cnes;
	}

	public function getCnes($cnes){
		$this->cnes = $cnes;
	}
public function getTipo() {
    return $this->tipo;
}
 
public function setTipo($tipo) {
    $this->tipo = $tipo;
}
	public function getTerritorio() {
	    return $this->territorio;
	}
	 
	public function setTerritorio($territorio) {
	    $this->territorio = $territorio;
	}
	public function getCep() {
	    return $this->cep;
	}
	 
	public function setCep($cep) {
	    $this->cep = $cep;
	}
	public function getEndereco() {
	    return $this->endereco;
	}
	 
	public function setEndereco($endereco) {
	    $this->endereco = $endereco;
	}
	public function getNumero() {
	    return $this->numero;
	}
	 
	public function setNumero($numero) {
	    $this->numero = $numero;
	}
	public function getBairro() {
	    return $this->bairro;
	}
	 
	public function setBairro($bairro) {
	    $this->bairro = $bairro;
	}
	public function getCidade() {
	    return $this->cidade;
	}
	 
	public function setCidade($cidade) {
	    $this->cidade = $cidade;
	}
	public function getUf() {
	    return $this->uf;
	}
	 
	public function setUf($uf) {
	    $this->uf = $uf;
	}


	public function insert(){

		$sql  = "INSERT INTO $this->table (udd_tipo, udd_nome, udd_cnes, udd_territorio, udd_cep, udd_endereco, udd_numero, udd_bairro, udd_cidade, udd_uf) VALUES (:tipo, :unidade, :cnes, :territorio, :cep, :endereco, :numero, :bairro, :cidade, :uf)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':tipo', $this->tipo);
		$stmt->bindParam(':unidade', $this->unidade);
		$stmt->bindParam(':cnes', $this->cnes);
		$stmt->bindParam(':territorio', $this->territorio);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':uf', $this->uf);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET udd_nome = :unidade, udd_cnes = :cnes WHERE udd_id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':unidade', $this->nome);
		$stmt->bindParam(':cnes', $this->cnes);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}