<?php 

	class evento { 



    private $id_evento;

    private $id_congreso;

    private $titulo;

    private $tipo;

    private $area;

    private $hora_inicio;

    private $hora_fin;

    private $lugar;

    private $observaciones;
	 private $fecha;



//--------------- GETTERS----------------------------- //



	

	/**

	 * @return string id_evento

	 */

    function get_id_evento( ) {

        return $this->id_evento;

    }





     /**

	 * @return string id_congreso

	 */

    function get_id_congreso( ) {

        return $this->id_congreso;

    }

	/**

	 * @return string titulo

	 */

    function get_titulo( ) {

        return $this->titulo;

    }

	

	/**

	 * @return string tipo

	 */

    function get_tipo( ) {

        return $this->tipo;

    }

	

	/**

	 * @return string area

	 */

    function get_area( ) {

        return $this->area;

    }

	

	/**

	 * @return string  hora_inicio

	 */

    function get_hora_inicio( ) {

        return $this->hora_inicio;

    }

	

	/**

	 * @return string hora_fin

	 */

    function get_hora_fin( ) {

        return $this->hora_fin;

    }

	

	/**

	 * @return string lugar

	 */

    function get_lugar( ) {

        return $this->lugar;

    }

	

	/**

	 * @return string observaciones

	 */

    function get_observaciones( ) {

        return $this->observaciones;

    }
	function get_fecha( ) {

        return $this->fecha;

    }





//--------------- SETTERS ----------------------------- //

     /**

	 * @paran string $id_evento identificador

	 */

  

    function set_id_evento( $id_evento ) {

        $this->id_evento = $id_evento;

    }

	

	 /**

	 * @paran string $id_congreso llave foranea

	 */



    function set_id_congreso( $id_congreso ) {

        $this->id_congreso = $id_congreso;

    }

	 /**

	 * @paran string $titulo titulo del evento

	 */

    function set_titulo( $titulo ) {

        $this->titulo = $titulo;

    }

	 /**

	 * @paran string $tipo Tipo de evento

	 */  

    function set_tipo( $tipo ) {

        $this->tipo = $tipo;

    }

	

	 /**

	 * @paran string $area Area del evento

	 */

    function set_area( $area ) {

        $this->area = $area;

    }

	

	 /**

	 * @paran string $hora_inicio Hora de inicio del evento

	 */



    function set_hora_inicio( $hora_inicio ) {

        $this->hora_inicio = $hora_inicio;

    }

	

	/**

	 * @paran string $hora_fin Hora de finalizacion del evento

	 */



    function set_hora_fin( $hora_fin ) {

        $this->hora_fin = $hora_fin;

    }

	

	/**

	 * @paran string $lugar Lugar del evento

	 */

  

    function set_lugar( $lugar ) {

        $this->lugar = $lugar;

    }



 	/**

	 * @paran string $observaciones 

	 */

    function set_observaciones( $observaciones ) {

        $this->observaciones = $observaciones;

    }
	  function set_fecha( $fecha ) {

        $this->fecha = $fecha;

    }







} 

?>