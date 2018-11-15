<?php

require_once 'Crud.php';

class Profissionais extends Crud{
	
	protected $table = 'profissional';

	private $nome;
	private $cpf;
	private $datanasc;
	private $cns;
	private $endereco;
	private $numero;
	private $bairro;
	private $cidade; 
	private $uf;
	private $cep;
	private $fone;
	private $email; 
	private $dataadmin;
	private $escolaridade;
	private $formacao;
	private $funcao;
	private $conselho;
	private $nconselho;
	private $cbo;
	private $datacadastro; 


	//Get's e Set's

public function getNome() {
    return $this->nome;
}
 
public function setNome($nome) {
    $this->nome = $nome;
}
public function getCpf() {
    return $this->cpf;
}
 
public function setCpf($cpf) {
    $this->cpf = $cpf;
}
public function getDatanasc() {
    return $this->datanasc;
}
 
public function setDatanasc($datanasc) {
    $this->datanasc = $datanasc;
}
public function getCns() {
    return $this->cns;
}
 
public function setCns($cns) {
    $this->cns = $cns;
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
public function getCep() {
    return $this->cep;
}
 
public function setCep($cep) {
    $this->cep = $cep;
}
public function getFone() {
    return $this->fone;
}
 
public function setFone($fone) {
    $this->fone = $fone;
}
public function getEmail() {
    return $this->email;
}
 
public function setEmail($email) {
    $this->email = $email;
}
public function getDataadmin() {
    return $this->dataadmin;
}
 
public function setDataadmin($dataadmin) {
    $this->dataadmin = $dataadmin;
}
public function getEscolaridade() {
    return $this->escolaridade;
}
 
public function setEscolaridade($escolaridade) {
    $this->escolaridade = $escolaridade;
}
public function getFormacao() {
    return $this->formacao;
}
 
public function setFormacao($formacao) {
    $this->formacao = $formacao;
}
public function getFuncao() {
    return $this->funcao;
}
 
public function setFuncao($funcao) {
    $this->funcao = $funcao;
}
public function getConselho() {
    return $this->conselho;
}
 
public function setConselho($conselho) {
    $this->conselho = $conselho;
}
public function getNconselho() {
    return $this->nconselho;
}
 
public function setNconselho($nconselho) {
    $this->nconselho = $nconselho;
}
public function getCbo() {
    return $this->cbo;
}
 
public function setCbo($cbo) {
    $this->cbo = $cbo;
}
public function getDatacadastro() {
    return $this->datacadastro;
}
 
public function setDatacadastro($datacadastro) {
    $this->datacadastro = $datacadastro;
}



	public function insert(){

		$sql  = "INSERT INTO $this->table (prof_nome, prof_cpf, prof_datanasc, prof_cns, prof_endereco, prof_numero, prof_bairro, prof_cidade, prof_uf, prof_cep, prof_fone, prof_email, prof_dataadm, prof_escolaridade, prof_formacao, prof_funcao, prof_conselho, prof_nConselho, prof_cbo, prof_dtCadastro) VALUES (:nome, :cpf, :datanasc, :cns, :endereco,:numero, :bairro, :cidade, :uf, :cep, :fone, :email, :dataadmin, :escolaridade, :formacao, :funcao, :conselho, :nconselho, :cbo, :datacadastro)";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':datanasc', $this->datanasc);
		$stmt->bindParam(':cns', $this->cns);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':uf', $this->uf);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':fone', $this->fone);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':dataadmin', $this->dataadmin);
		$stmt->bindParam(':escolaridade', $this->escolaridade);
		$stmt->bindParam(':formacao', $this->formacao);
		$stmt->bindParam(':funcao', $this->funcao);
		$stmt->bindParam(':conselho', $this->conselho);
		$stmt->bindParam(':nconselho', $this->nconselho);
		$stmt->bindParam(':cbo', $this->cbo);
		$stmt->bindParam(':datacadastro', $this->datacadastro);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET prof_nome = :nome, prof_cpf = :cpf, prof_datanasc = :datanasc, prof_cns= :cns, prof_endereco = :endereco, prof_numero = :numero, prof_bairro = :bairro, prof_cidade = :cidade, prof_uf = :uf, prof_cep = :cep, prof_fone = :fone, prof_email= :email, prof_dataadm = :dataadmin, prof_escolaridade = :escolaridade, prof_formacao = :formacao, prof_funcao = :funcao, prof_conselho = :conselho, prof_nConselho = :nconselho, prof_cbo = :cbo WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':datanasc', $this->datanasc);
		$stmt->bindParam(':cns', $this->cns);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':uf', $this->uf);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':fone', $this->fone);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':dataadmin', $this->dataadmin);
		$stmt->bindParam(':escolaridade', $this->escolaridade);
		$stmt->bindParam(':formacao', $this->formacao);
		$stmt->bindParam(':funcao', $this->funcao);
		$stmt->bindParam(':conselho', $this->conselho);
		$stmt->bindParam(':nconselho', $this->nconselho);
		$stmt->bindParam(':cbo', $this->cbo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}