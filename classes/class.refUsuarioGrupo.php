<?php
	class RefUsuarioGrupo{

		public $id_ref_usuario_grupo;
		public $fk_grupo;
		public $fk_usuario;

		public function adicionar()
		{
			$sql = "INSERT INTO ref_usuario_grupo (fk_usuario,fk_grupo) values (:fk_usuario,:fk_grupo)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':fk_usuario',$this->fk_usuario);
			$stmt->bindParam(':fk_grupo',$this->fk_grupo);
			$stmt->execute();

		}


		/*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       	public function getId(){
         	return $this->id;
       	}

       public function setId($id){
         $this->id = $id;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO GRUPO_ID
       /*------------------------------------*/

       	public function getGrupoId(){
         	return $this->grupo_id;
       	}

       public function setIdGrupo($fk_grupo){
         $this->fk_grupo = $fk_grupo;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO USUARIO_ID
       /*------------------------------------*/

       	public function getUsuarioId(){
         	return $this->fk_usuario_id;
       	}

       public function setIdUsuario($fk_usuario){
         $this->fk_usuario = $fk_usuario;
       }

			 public function setGrupoUsuario($fk_grupo)
			 {
				 $this->fk_grupo = $fk_grupo;
			 }

	}
?>
