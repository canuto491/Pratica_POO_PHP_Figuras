<?php 
/**
 * Class Triangulo
 */
class Triangulo /* extends AnotherClass */
{
	private $lado_a;
	private $lado_b;
	private $lado_c;
	private $lados = array();//contem os lados em forma de array
	private $angulos = array();//contem os angulos do triangulo

	/**
	 * construtor da clase triangulo. neste sao atribuidos os valores dos lados
	 * aos atributos da classe asim como os respetivos angulos sao armazenados,
	 * em forma de array, no atributo angulos
	 *
	 * @param      integer    $a      lado do triangulo
	 * @param      integer    $b      lado do triangulo
	 * @param      integer    $c      lado do triangulo
	 *
	 * @throws     Exception  os parametros devem ser de tipo numerico
	 *
	 * @return     Triangulo  devolve o proprio objeto.
	 */
	public function __construct(float $a,float $b,float $c)
	{

		if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
			throw new Exception("Os tres lados devem ser valores numericos");
		}

		/* preenchimento do array com os lados do triangulo */
		$this->lados[0] = $a;
		$this->lados[1] = $b;
		$this->lados[2] = $c;

		/* ordenacao dos lados do triangulo ficando o lado maior na ultima
		 * posicao do array */
		sort($this->lados);

		$this->lado_a = $this->lados[0];// o lado menor (se diferentes) fica atribuido ao a
		$this->lado_b = $this->lados[1];// o lado intermedio (se diferentes) fica no b
		$this->lado_c = $this->lados[2];// o lado menor (se diferentes) fica no c
		
		self::calculaAngulos();

		return $this;

	}

	/**
	 * determina o tipo de triangulo.
	 *
	 * @return     string  tipo de triangulo [Equilátero| Isósceles| Escaleno].
	 */
	public function classificacaoLados():string{
		/*
		 * com o array que contem os lados cria-se um sub array que tem os lados
		 * sem valores repetidos
		 */
		$lados_sem_repeticao =array_unique($this->lados,SORT_NUMERIC);
		
		/* se so ha um lado no array resultante da eliminacao de repetidos todos
		 * os lados sao iguais, pelo que o triangulo e equilatero (triângulo que
		 * possui todos os lados congruentes, ou seja, iguais.) */
		if (count($lados_sem_repeticao)==1) {
			return "Equilátero";
		}

		/* se existirem 2 lados no array resultante da eliminacao de repetidos
		 * entao o triangulo tem 2 lados iguais e um diferente, pelo que o
		 * triangulo e Isósceles (triângulo que tem [pelo menos] dois lados
		 * iguais) */
		if (count($lados_sem_repeticao)==2) {
			return "Isósceles";
		}
		/* se existirem 3 lados no array resultante da eliminacao de repetidos
		 * entao o triangulo tem 3 lados diferentes, pelo que o triangulo e
		 * Escaleno (triângulo que tem as medidas dos três lados diferentes) */
		if (count($lados_sem_repeticao)==3) {
			return "Escaleno";
		}
	}

	/**
	 * Determina o semiperimetro de um triangulo, necesario para calcular a area
	 * com a formula de Heron
	 *
	 * @return     float  semiperimetro do triangulo (perimetro/2)
	 */
	private function semiperimetro():float{
		return ($this->perimetro()/2);
	}

	/**
	 * determina o perimetro do triangulo (soma dos lados)
	 *
	 * @return     float  perimetro do triangulo.
	 */
	public function perimetro():float{
		return (array_sum($this->lados));
	}

	/**
	 * Area do triangulo  pela formula de Heron (A = √s(s - a)(s - b)(s - c))
	 * requer a funcao semiperimetro
	 *
	 * @return     float  area do triangulo
	 */
	public function area():float{
		$s = self::semiperimetro();
		return sqrt(($s * ($s - $this->lado_a) * ($s - $this->lado_b) * ($s - $this->lado_c)));
	}

	/**
	 * Aplicando a Lei dos Cosenos atualiza-se array que contem os angulos do
	 * triangulo (ordenados da forma A-B-C)
	 */
	private function calculaAngulos(){
		$this->angulos["A"] =  self::leiCoseno($this->lado_a, $this->lado_b, $this->lado_c);
		$this->angulos["B"] =  self::leiCoseno($this->lado_b, $this->lado_a, $this->lado_c);
		$this->angulos["C"] =  self::leiCoseno($this->lado_c, $this->lado_a, $this->lado_b);
		
	}

	/**
	 * devolve o resultado da aplicacao da formula a= √(b^2 +c^2 – 2b(c cos α))
	 *
	 * @param      float          $lado_a  The lado a
	 * @param      float|integer  $lado_b  The lado b
	 * @param      float|integer  $lado_c  The lado c
	 *
	 * @return     float          o resultado da avaliacao da lei do coseno
	 */
	private function leiCoseno(float $lado_a, float $lado_b, float $lado_c):float{
		$numerador = pow($lado_b, 2) + pow($lado_c, 2) - pow($lado_a, 2);
		$denominador = 2 * $lado_b * $lado_c;
		$leiCoseno = acos( $numerador / $denominador); 
		$leiCoseno = rad2deg($leiCoseno); // Converte um numero radiano no seu equivalente em graus
		return $leiCoseno;
	}
	
	/**
	 * Indica se o angulo fornecido e ou nao um angulo agudo. (i.e se o angulo e
	 * menor de 90 graus)
	 *
	 * @param      float|integer  $angulo  o angulo a ser avaliado
	 *
	 * @return     bool           se o angulo fornecido e ou nao agudo
	 */
	private static function eAgudo(float $angulo):bool{
		return $eAgudo = ($angulo < 90) ? true : false ;
	}

	/**
	 * Indica se o angulo fornecido e ou nao um angulo obtuso. (i.e se o angulo
	 * e maior de 90 graus)
	 *
	 * @param      float|integer  $angulo  o angulo a ser avaliado
	 *
	 * @return     bool           se o angulo fornecido e ou nao obtuso
	 */
	private static function eObtuso(float $angulo):bool{
		return $eObtuso = ($angulo > 90) ? true : false ;
	}

	/**
	 * Indica se o angulo fornecido e ou nao um angulo reto. (i.e se o angulo e
	 * igual a 90 graus)
	 *
	 * @param      float|integer  $angulo  o angulo a ser avaliado
	 *
	 * @return     bool           se o angulo fornecido e ou nao um angulo reto
	 */
	private static function eRecto(float $angulo):bool{
		return $eAgudo = ($angulo == 90) ? true : false ;
	}

	
	/**
	 * Determina, mediante o estudo dos angulos do triangulo, se o mesmo e Retângulo, 
	 *
	 * @return     string  ( description_of_the_return_value )
	 */
	public function classificacaoAngulos(){
		$angulosAgudos	= array_filter($this->angulos, "static::eAgudo");
		$angulosObtusos	= array_filter($this->angulos, "static::eObtuso");
		$angulosRectos	= array_filter($this->angulos, "static::eRecto");
		
		/**
		 * Triângulo retângulo é um triângulo que possui um ângulo reto e outros
		 * dois ângulos agudos, para tanto basta que tenha um ângulo reto (90°),
		 * pois a soma dos três ângulos internos é igual a um ângulo raso (180°)
		 *
		 * Os ângulos agudos de um triângulo retângulo, opostos aos catetos, são
		 * complementares (ou seja, sua soma é igual a 90°).
		 */
		
		if ((count($angulosRectos) == 1) && (count($angulosAgudos) == 2) && (array_sum($angulosAgudos) == 90)) {
			return "Triângulo Retângulo";
		}

		/**
		 * Um triângulo obtusângulo possui um ângulo obtuso e dois ângulos
		 * agudos.
		 */
		if ((count($angulosObtusos) == 1) && (count($angulosAgudos) == 2)) {
			return "Triângulo Obtusângulo";
		}

		/**
		 * Em um triângulo acutângulo, os três ângulos são agudos.
		 */
		if (count($angulosAgudos) == 3) {
			return "Triângulo Acutângulo";
		}

		/* se nao se cumpre nenhuma das condicoes anteriores nao e possivel
		 * indicar o tipo de triangulo segundo os seus angulos */
		throw new Exception("Não é possivel indicar o tipo de triângulo segundo o seus ângulos com base nos lados fornecidos", 1);
		
	}
}
?>