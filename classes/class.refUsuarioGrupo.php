<?php
	class RefUsuarioGrupo{
		public $id_ref_usuario_grupo;
		public $fk_grupo;
		public $fk_usuario;


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

       public function setGrupoId($fk_grupo){
         $this->fk_grupo = $fk_grupo;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO USUARIO_ID
       /*------------------------------------*/

       	public function getUsuarioId(){
         	return $this->fk_usuario_id;
       	}

       public function setUsuarioId($fk_usuario){
         $this->fk_usuario = $fk_usuario;
       }

	}
?>
